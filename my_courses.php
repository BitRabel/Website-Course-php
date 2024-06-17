<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Learning Dashboard</title>
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
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .sidebar.collapsed ~ .main-content {
            margin-left: 20px;
        }
        .header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
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
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            width: calc(45% - 20px);
            position: relative;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h3 {
            margin: 0 0 10px 0;
        }
        .card p {
            margin: 10px 0;
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
        .card img {
            width: 100%;
            border-radius: 10px;
            margin-top: 10px;
        }
        .chart-container {
            background-color: #1b1b2f;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: calc(45% - 20px);
            margin-bottom: 20px;
        }
        .chart-container h3 {
            margin: 0 0 10px 0;
            color: #f0f0f0;
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
           
    </div>
    <button class="toggle-btn" id="toggle-btn">☰</button>
    <div class="main-content" id="main-content">
        <div class="header">
            <h1>Courses</h1>
            <input type="text" placeholder="Search">
        </div>
        <!-- Favorite Course 1 -->
        <div class="card">
            <h3>Python Programming</h3>
            <p>Learn Python from scratch with hands-on projects.</p>
            <button>Learn now</button>
            <img src="https://via.placeholder.com/600x300/1f4068/ffffff?text=Python+Programming" alt="Python Course Image">
        </div>
        <div class="chart-container">
            <h3>Course Progress</h3>
            <canvas id="progressChart1"></canvas>
        </div>
        <!-- Favorite Course 2 -->
        <div class="card">
            <h3>Web Development Bootcamp</h3>
            <p>Master web development with HTML, CSS, and JavaScript.</p>
            <button>Learn now</button>
            <img src="https://via.placeholder.com/600x300/1f4068/ffffff?text=Web+Development+Bootcamp" alt="Web Development Course Image">
        </div>
        <div class="chart-container">
            <h3>Course Progress</h3>
            <canvas id="progressChart2"></canvas>
        </div>
        <!-- Favorite Course 3 -->
        <div class="card">
            <h3>Data Science Fundamentals</h3>
            <p>Explore data science with Python and machine learning.</p>
            <button>Learn now</button>
            <img src="https://via.placeholder.com/600x300/1f4068/ffffff?text=Data+Science+Fundamentals" alt="Data Science Course Image">
        </div>
        <div class="chart-container">
            <h3>Course Progress</h3>
            <canvas id="progressChart3"></canvas>
        </div>
        <!-- Favorite Course 4 -->
        <div class="card">
            <h3>UI/UX Design Principles</h3>
            <p>Learn essential principles of UI/UX design.</p>
            <button>Learn now</button>
            <img src="https://via.placeholder.com/600x300/1f4068/ffffff?text=UI%2FUX+Design+Principles" alt="UI/UX Design Course Image">
        </div>
        <div class="chart-container">
            <h3>Course Progress</h3>
            <canvas id="progressChart4"></canvas>
        </div>
        <!-- Favorite Course 5 -->
        <div class="card">
            <h3>Blockchain Essentials</h3>
            <p>Understand blockchain technology and its applications.</p>
            <button>Learn now</button>
            <img src="https://via.placeholder.com/600x300/1f4068/ffffff?text=Blockchain+Essentials" alt="Blockchain Course Image">
        </div>
        <div class="chart-container">
            <h3>Course Progress</h3>
            <canvas id="progressChart5"></canvas>
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

        // Sample data for course progress (replace with actual data if available)
        const courseCompletionData = [85, 70, 60, 50, 75]; // Example completion percentages

        // Initialize charts for each course
        for (let i = 1; i <= 5; i++) {
            const completionData = {
                labels: ['Completed', 'In Progress', 'Not Started'],
                datasets: [{
                    label: 'Course Completion',
                    data: [
                        courseCompletionData[i-1], // Completed
                        100 - courseCompletionData[i-1], // In Progress + Not Started
                    ],
                    backgroundColor: ['#1f4068', '#e43f5a']
                }]
            };

            const completionConfig = {
                type: 'bar',
                data: completionData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                color: '#f0f0f0'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#f0f0f0'
                            }
                        }
                    }
                }
            };

            const completionChart = new Chart(
                document.getElementById(`progressChart${i}`),
                completionConfig
            );
        }
    </script>
</body>
</html>
