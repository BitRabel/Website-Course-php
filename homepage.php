<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #1a1a2e;
            color: #f0f0f0;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #162447;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            box-sizing: border-box;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .sidebar.collapsed {
            transform: translateX(-250px);
        }
        .toggle-btn {
            background-color: #e43f5a;
            border: none;
            color: #f0f0f0;
            padding: 10px 20px;
            cursor: pointer;
            position: absolute;
            top: 20px;
            left: 250px;
            transform: translateX(-100%);
            transition: left 0.3s ease;
        }
        .sidebar.collapsed ~ .toggle-btn {
            left: 0;
        }
        .sidebar h2 {
            color: #f0f0f0;
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 20px 0;
        }
        .sidebar ul li a {
            color: #f0f0f0;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .sidebar ul li a:hover {
            background-color: #1f4068;
        }
        .profile {
            text-align: center;
            margin-top: 20px;
        }
        .profile img {
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .main-content {
            margin-left: 270px;
            padding: 20px;
            box-sizing: border-box;
            transition: margin-left 0.3s ease;
        }
        .sidebar.collapsed ~ .main-content {
            margin-left: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
            font-size: 1.5em;
        }
        .header input {
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 200px;
        }
        .card {
            background-color: #1f4068;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h3 {
            margin: 0 0 10px 0;
        }
        .card button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #e43f5a;
            color: #f0f0f0;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .card button:hover {
            background-color: #ff6f61;
        }
        .learning-path {
            display: flex;
            justify-content: space-between;
        }
        .path-card {
            background-color: #1b1b2f;
            padding: 20px;
            border-radius: 10px;
            width: 30%;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .path-card:hover {
            transform: translateY(-5px);
        }
        .path-card h3 {
            margin: 0 0 10px 0;
        }
        .learning-progress, .learning-points {
            background-color: #1b1b2f;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .learning-progress h3, .learning-points h3 {
            margin: 0 0 10px 0;
        }
        .learning-progress ul {
            list-style: none;
            padding: 0;
        }
        .learning-progress ul li {
            margin: 10px 0;
            padding: 10px;
            background-color: #24324a;
            border-radius: 5px;
        }
        .learning-progress ul li span {
            float: right;
            color: #e43f5a;
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="my_courses.php">My Courses</a></li>
            
            <li><a href="test.php">Test</a></li>
            <li><a href="index.php">Logout</a></li>
            
            <li><a href="index.php?page=logout">Logout</a></li>
        </ul>
    </div>
    <button class="toggle-btn" id="toggle-btn">☰</button>
    <div class="main-content" id="main-content">
        <div class="header">
            <h1>Welcome to the Learning platform</h1>
            <input type="text" placeholder="Search">
        </div>
        <div class="card">
            <h3>Artificial Intelligence for Marketing</h3>
            <p>Learn how artificial intelligence is reshaping the way marketing is done at both large and small organizations.</p>
            <button>Learn now</button>
        </div>
        <div class="learning-path">
            <div class="path-card">
                <h3>Intro to React</h3>
                <p>12 hours of tutorials</p>
            </div>
            <div class="path-card">
                <h3>Intro to React</h3>
                <p>12 hours of tutorials</p>
            </div>
            <div class="path-card">
                <h3>Intro to React</h3>
                <p>12 hours of tutorials</p>
            </div>
        </div>
        <div class="learning-progress">
            <h3>Course in Progress</h3>
            <ul>
                <li>Build Your First Application using Angular - <span>Complete</span></li>
                <li>Build Your First Application using React - <span>In Progress</span></li>
                <li>UI/UX designing using FIGMA - <span>Complete</span></li>
            </ul>
        </div>
        <div class="learning-points">
            <h3>Your learning point</h3>
             <p>8/10</p>
        </div>
    </div>
    
        <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            switch ($page) {
                case 'home':
                    include 'home.php';
                    break;
                case 'my_courses':
                    include 'pages/my_courses.php';
                    break;
                case 'favorite':
                    include 'pages/favorite.php';
                    break;
                case 'test':
                    include 'pages/test.php';
                    break;
                case 'achievements':
                    include 'pages/achievements.php';
                    break;
                case 'certificate':
                    include 'pages/certificate.php';
                    break;
                case 'settings':
                    include 'pages/settings.php';
                    break;
                default:
                    include 'pages/home.php';
                    break;
            }
        ?>
    </div>
    <script>
        const toggleBtn = document.getElementById('toggle-btn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('collapsed');
        });
    </script>
</body>
</html>
