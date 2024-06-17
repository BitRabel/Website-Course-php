<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ Test - Learning Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #1a1a2e;
            color: #f0f0f0;
            display: flex;
            justify-content: flex-start; /* Adjusted for sidebar */
            align-items: flex-start; /* Adjusted for sidebar */
            min-height: 100vh; /* Ensure full viewport height */
        }
        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #162447;
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

        /* Main Content Styles */
        .main-content {
            background-color: #1a1a2e;
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }
        .test-container {
            background-color: #162447;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 80%;
            max-width: 600px;
            text-align: center;
            margin: 20px auto;
        }
        .question {
            display: none;
        }
        .question.active {
            display: block;
        }
        .question h3 {
            margin-top: 0;
        }
        .options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 10px;
        }
        .option {
            background-color: #1f4068;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .option:hover {
            background-color: #1f5981;
        }
        .submit-btn {
            background-color: #e43f5a;
            border: none;
            color: #f0f0f0;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
            display: none;
        }
        .submit-btn:hover {
            background-color: #ff6f61;
        }
        .timer {
            margin-top: 20px;
            text-align: center;
            font-size: 1.2em;
        }
        .result {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Sidebar Section -->
    <div class="sidebar" id="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="my_courses.php">My Courses</a></li>
            <li><a href="test.php">Test</a></li>
            <li><a href="index.php">Logout</a></li>
        </ul>
    </div>
    
    <!-- Toggle Button for Sidebar -->
    <button class="toggle-btn" id="toggle-btn">☰</button>
    <div class="test-container">
        <div class="question active" data-question="1">
            <h3>Question 1: What is the capital of France?</h3>
            <div class="options">
                <div class="option" data-answer="correct">Paris</div>
                <div class="option">Berlin</div>
                <div class="option">London</div>
                <div class="option">Madrid</div>
            </div>
        </div>
        <div class="question" data-question="2">
            <h3>Question 2: Who wrote 'To Kill a Mockingbird'?</h3>
            <div class="options">
                <div class="option">J.K. Rowling</div>
                <div class="option" data-answer="correct">Harper Lee</div>
                <div class="option">George Orwell</div>
                <div class="option">Ernest Hemingway</div>
            </div>
        </div>
        <div class="question" data-question="3">
            <h3>Question 3: Which planet is known as the Red Planet?</h3>
            <div class="options">
                <div class="option">Earth</div>
                <div class="option" data-answer="correct">Mars</div>
                <div class="option">Venus</div>
                <div class="option">Jupiter</div>
            </div>
        </div>
        <div class="question" data-question="4">
            <h3>Question 4: Who painted the Mona Lisa?</h3>
            <div class="options">
                <div class="option" data-answer="correct">Leonardo da Vinci</div>
                <div class="option">Pablo Picasso</div>
                <div class="option">Vincent van Gogh</div>
                <div class="option">Michelangelo</div>
            </div>
        </div>
        <div class="question" data-question="5">
            <h3>Question 5: What is the largest ocean on Earth?</h3>
            <div class="options">
                <div class="option">Atlantic Ocean</div>
                <div class="option">Indian Ocean</div>
                <div class="option">Arctic Ocean</div>
                <div class="option" data-answer="correct">Pacific Ocean</div>
            </div>
        </div>
        <div class="result" id="result">
            <h3>Quiz Completed!</h3>
            <p>Your score is <span id="score"></span>/5</p>
        </div>
        <button class="submit-btn" id="submitBtn">Submit Answers</button>
        <div class="timer" id="timer">Time Left: <span id="time">10:00</span></div>
    </div>

    <script>
        // Timer logic
        const startingMinutes = 10;
        let time = startingMinutes * 60;
        const countdownEl = document.getElementById('time');
        const countdownInterval = setInterval(updateTimer, 1000);

        function updateTimer() {
            const minutes = Math.floor(time / 60);
            let seconds = time % 60;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            countdownEl.textContent = `${minutes}:${seconds}`;
            time--;

            if (time < 0) {
                clearInterval(countdownInterval);
                showResult();
            }
        }

        // Quiz logic
        let currentQuestion = 1;
        const totalQuestions = 5;
        let score = 0;

        document.querySelectorAll('.option').forEach(option => {
            option.addEventListener('click', () => {
                const parentQuestion = option.closest('.question');
                const isCorrect = option.dataset.answer === 'correct';

                if (isCorrect) {
                    score++;
                    alert('Correct!');
                } else {
                    alert('Incorrect!');
                }

                parentQuestion.classList.remove('active');
                currentQuestion++;

                if (currentQuestion > totalQuestions) {
                    clearInterval(countdownInterval);
                    showResult();
                } else {
                    document.querySelector(`.question[data-question="${currentQuestion}"]`).classList.add('active');
                }
            });
        });

        function showResult() {
            document.querySelectorAll('.question').forEach(q => q.classList.remove('active'));
            document.getElementById('result').style.display = 'block';
            document.getElementById('score').textContent = score;
        }

        // Submit button logic (can be adapted based on actual submission needs)
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.addEventListener('click', () => {
            clearInterval(countdownInterval); // Stop timer when answers are submitted
            alert('Answers submitted! Redirecting to Home Page...');
            window.location.href = 'home.php';
        });
    </script>
</body>
</html>
