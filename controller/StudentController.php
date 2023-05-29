<?php
require_once 'config.php';
require_once 'classes/Student.php';

header('Content-Type: application/json');

$student = new Student($database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    
    $studentId = $student->create($name, $age, $email);
    echo json_encode(['id' => $studentId]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get a student by ID
    if (isset($_GET['id'])) {
        $studentId = $_GET['id'];
        $studentData = $student->get($studentId);
        
        if ($studentData) {
            echo json_encode($studentData);
        } else {
            echo json_encode(['error' => 'Student not found']);
        }
    } else {
        
        $stmt = $db->query("SELECT * FROM students");
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($students);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $putParams);
    
    $studentId = $putParams['id'];
    $name = $putParams['name'];
    $age = $putParams['age'];
    $email = $putParams['email'];
    
    $result = $student->update($studentId, $name, $age, $email);
    
    if ($result) {
        echo json_encode(['success' => 'Student updated successfully']);
    } else {
        echo json_encode(['error' => 'Failed to update student']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $deleteParams);
    
    $studentId = $deleteParams['id'];
    
    $result = $student->delete($studentId);
    
    if ($result) {
        echo json_encode(['success' => 'Student deleted successfully']);
    } else {
        echo json_encode(['error' => 'Failed to delete student']);
    }
}
?>
