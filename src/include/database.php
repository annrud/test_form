<?php

$conn = connectToDB();

/**
 * @throws Exception
 */
function connectToDB(): mysqli
{
    $conn = mysqli_connect("test-form-mysql", "user", "user", "test_form");
    if (!$conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

/**
 * @throws Exception
 */
function isUserUnique(string $login, string $phone, string $email, ?int $id = null): bool
{
    global $conn;
    $sql = "SELECT COUNT(*) as q FROM user WHERE (
        login='$login' 
        OR phone='$phone' 
        OR email='$email'
    )";
    if (!is_null($id)) {
        $sql .= ' AND id !=' . $id;
    }
    $query = $conn->query($sql);
    if (!$query) {
        throw new Exception("Query failed: " . $conn->error);
    }
    $result = $query->fetch_column();

    return $result == 0;
}

/**
 * @throws Exception
 */
function createUser(string $login, string $phone, string $email, string $password): int
{
    global $conn;
    $result = $conn->execute_query(
        'INSERT INTO user (login, phone, email, password) VALUES (?, ?, ?, ?)',
        [$login, $phone, $email, $password]
    );
    if (!$result) {
        throw new Exception("Query failed: " . $conn->error);
    }

    return $conn->insert_id;
}

/**
 * @throws Exception
 */
function updateUser(int $id, string $login, string $phone, string $email, ?string $password = null): void
{
    global $conn;
    $sql = 'UPDATE user SET login = ?, phone = ?, email = ?';
    $params = [$login, $phone, $email];
    if (!is_null($password)) {
        $sql .= ', password = ?';
        $params[] = $password;
    }
    $sql .= ' WHERE id = ?';
    $params[] = $id;
    $result = $conn->execute_query($sql, $params);
    if (!$result) {
        throw new Exception("Query failed: " . $conn->error);
    }
}

/**
 * @throws Exception
 */
function loginUser(string $phoneEmail, string $password): int
{
    global $conn;
    $query = $conn->query("SELECT id FROM user WHERE (phone='" . $phoneEmail . "' OR email='" . $phoneEmail . "') AND password='" . $password . "'");
    if (!$query) {
        throw new Exception("Query failed: " . $conn->error);
    }

    return $query->fetch_column();
}

/**
 * @throws Exception
 */
function getUser(string $id): ?array
{
    global $conn;
    $query = $conn->query("SELECT login, phone, email FROM user WHERE id=$id");
    if (!$query) {
        throw new Exception("Query failed: " . $conn->error);
    }

    return $query->fetch_assoc();
}




