# Smart-Healthcare-Queue-System
MedPrime is a specialized queue management solution designed to bridge the gap between patient arrival and clinical consultation. By leveraging real-time database triggers and a high-visibility "Now Serving" dashboard, we provide medical centers with a streamlined tool to enhance patient experience and operational efficiency
MedPrime | Professional Queue Management Solution
A Digital Transformation Project by Momentum Digital:
MedPrime is a high-visibility, real-time queue management system designed to optimize patient flow and reduce perceived wait times in medical facilities. Developed with a focus on minimalist design and operational efficiency, it transforms manual patient tracking into a streamlined digital experience.


# The Vision:

In many local medical centers, patient management remains a manual hurdle. MedPrime solves this by providing a premium, "at-a-glance" dashboard that keeps both staff and patients informed.


# Features:


Live-Sync Dashboard: Features a 10-second automated refresh cycle to ensure real-time accuracy.

Glassmorphism UI: A dark-themed, ethereal digital interface designed for modern medical environments.

Dynamic Doctor Matching: Intelligent SQL logic that joins patient records with scheduled medical professionals automatically.

Mobile-Responsive Navigation: Integrated quick-nav controls for seamless movement between the live queue and administrative landing pages.


# Technical Stack:


Backend: PHP (Object-Oriented Logic)
Database: MySQL with relational JOINS for data integrity
Frontend: CSS3 (Glassmorphism & Flexbox layout)
Environment: Optimized for deployment in hospital intranets or cloud hosting.


# Project Structure:


Plaintext
├── db_conn.php       # Secure database connection (Excluded in production)
├── index.php         # Momentum Digital branded landing page
├── queue_display.php # The Live "Now Serving" dashboard
├── assets/           # UI components and hospital background renders
└── sql/              # Database schema and sample appointment date


# Privacy & Security:
As this is a healthcare-adjacent tool, MedPrime is built with data sanitization using htmlspecialchars and prepared statements to ensure patient information remains secure within the facility's network.
