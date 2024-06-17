<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Learning Dashboard</title>
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
        .chart-container {
            background-color: #1b1b2f;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: inline-block;
            width: 45%;
            vertical-align: top;
        }
        .chart-container h3 {
            margin: 0 0 10px 0;
        }
        .chart-container canvas {
            width: 100%;
            height: 200px;
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
            
        </ul>
    </div>
    <button class="toggle-btn" id="toggle-btn">☰</button>
    <div class="main-content" id="main-content">
        <div class="header">
            <h1>Home</h1>
            <input type="text" placeholder="Search">
        </div>
        <div class="card">
            <h3>Artificial Intelligence for Marketing</h3>
            <p>Learn how artificial intelligence is reshaping the way marketing is done at both large and small organizations.</p>
            <button>Learn now</button>
        </div>
        <div class="chart-container">
            <h3>Course Completion Rate</h3>
            <canvas id="completionChart"></canvas>
        </div>
        <div class="chart-container">
            <h3>Student Satisfaction</h3>
            <canvas id="satisfactionChart"></canvas>
        </div>
        <div class="card">
            <h3>Introduction to React</h3>
            <p>12 hours of tutorials to get you started with React, a popular JavaScript library for building user interfaces.</p>
            <button>Learn now</button>
        </div>
        <div class="chart-container">
            <h3>Course Popularity</h3>
            <canvas id="popularityChart"></canvas>
        </div>
        <div class="chart-container">
            <h3>Learning Time Distribution</h3>
            <canvas id="timeChart"></canvas>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggle-btn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('collapsed');
        });

        // Data for completion chart
        const completionData = {
            labels: ['Completed', 'In Progress', 'Not Started'],
            datasets: [{
                label: 'Course Completion',
                data: [65, 20, 15],
                backgroundColor: ['#1f4068', '#e43f5a', '#24324a']
            }]
        };

        // Config for completion chart
        const completionConfig = {
            type: 'doughnut',
            data: completionData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        };

        // Render completion chart
        const completionChart = new Chart(
            document.getElementById('completionChart'),
            completionConfig
        );

        // Data for satisfaction chart
        const satisfactionData = {
            labels: ['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Very Dissatisfied'],
            datasets: [{
                label: 'Student Satisfaction',
                data: [50, 30, 10, 5, 5],
                backgroundColor: ['#1f4068', '#e43f5a', '#24324a', '#1a1a2e', '#ff6f61']
            }]
        };

        // Config for satisfaction chart
        const satisfactionConfig = {
            type: 'bar',
            data: satisfactionData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Student Satisfaction Levels'
                    }
                }
            }
        };

        // Render satisfaction chart
        const satisfactionChart = new Chart(
            document.getElementById('satisfactionChart'),
            satisfactionConfig
        );

        // Data for popularity chart
        const popularityData = {
            labels: ['AI for Marketing', 'Intro to React', 'UI/UX Design', 'Angular Basics', 'Python Programming'],
            datasets: [{
                label: 'Course Popularity',
                data: [75, 50, 60, 45, 80],
                backgroundColor: ['#1f4068', '#e43f5a', '#24324a', '#1a1a2e', '#ff6f61']
            }]
        };

        // Config for popularity chart
        const popularityConfig = {
            type: 'bar',
            data: popularityData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Course Popularity'
                    }
                }
            }
        };

        // Render popularity chart
        const popularityChart = new Chart(
            document.getElementById('popularityChart'),
            popularityConfig
        );

        // Data for learning time chart
        const timeData = {
            labels: ['0-1 hrs', '1-2 hrs', '2-3 hrs', '3-4 hrs', '4+ hrs'],
            datasets: [{
                label: 'Learning Time Distribution',
                data: [10, 20, 30, 25, 15],
                backgroundColor: ['#1f4068', '#e43f5a', '#24324a', '#1a1a2e', '#ff6f61']
            }]
        };

        // Config for learning time chart
        const timeConfig = {
            type: 'pie',
            data: timeData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Learning Time Distribution'
                    }
                }
            }
        };

        // Render learning time chart
        const timeChart = new Chart(
            document.getElementById('timeChart'),
            timeConfig
        );
    </script>
    
</body>
</html>
