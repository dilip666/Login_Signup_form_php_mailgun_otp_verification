<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dilip Kumar Sharma - Portfolio</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: #fff;
            overflow-x: hidden;
        }
        header {
            text-align: center;
            padding: 50px 20px;
            background: #333;
        }
        header h1 {
            font-size: 3rem;
            margin: 0;
        }
        header p {
            font-size: 1.2rem;
            margin: 10px 0;
            font-style: italic;
        }
        nav {
            text-align: center;
            margin: 20px 0;
        }
        nav a {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            background: #444;
            margin: 0 5px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        nav a:hover {
            background: #555;
        }
        section {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }
        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            text-transform: uppercase;
            color: #ffdd57;
        }
        .about, .skills, .projects, .contact {
            margin-bottom: 50px;
            text-align: center;
        }
        .skills ul, .projects ul {
            list-style-type: none;
            padding: 0;
        }
        .skills li, .projects li {
            background: #444;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .contact form {
            max-width: 600px;
            margin: 0 auto;
        }
        .contact input, .contact textarea, .contact button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        .contact input, .contact textarea {
            background: #222;
            color: #fff;
        }
        .contact button {
            background: #ffdd57;
            color: #333;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        .contact button:hover {
            background: #ffcc33;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #222;
        }
    </style>
</head>
<body>
    <header>
        <h1>Dilip Kumar Sharma</h1>
        <p>Mechanical Engineer | Design Enthusiast | STEAM Trainer</p>
        <nav>
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <section id="about" class="about">
        <h2 class="section-title">About Me</h2>
        <p>I'm a Mechanical Engineer with a passion for design, innovation, and teaching. 
           Currently working as a STEAM Trainer, I aim to inspire young minds and develop cutting-edge solutions in design engineering.</p>
    </section>

    <section id="skills" class="skills">
        <h2 class="section-title">Skills</h2>
        <ul>
            <li>CAD Modeling (Fusion 360, SolidWorks)</li>
            <li>3D Printing & Prototyping</li>
            <li>Arduino Programming & Electronics</li>
            <li>Educational Instruction & Workshop Facilitation</li>
            <li>Lesson Planning & Curriculum Development</li>
        </ul>
    </section>

    <section id="projects" class="projects">
        <h2 class="section-title">Projects</h2>
        <ul>
            <li>Sideway Parking System (Arduino-based automation)</li>
            <li>Face Recognition App (Python, OpenCV)</li>
            <li>Hopper Design (SolidWorks)</li>
            <li>Tool Holder Design (AutoCAD)</li>
        </ul>
    </section>

    <section id="contact" class="contact">
        <h2 class="section-title">Contact Me</h2>
        <form action="#" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
            
        </form>
        <a href="logout.php" class="logout-button">Log Out</a>

    </section>

    <footer>
        <p>&copy; 2024 Dilip Kumar Sharma. All rights reserved.</p>
    </footer>
</body>
</html>

