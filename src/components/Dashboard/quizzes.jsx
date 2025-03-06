import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

function Quizzes() {
    const [quizzes, setQuizzes] = useState([]);

    useEffect(() => {
        const fetchQuizzes = async () => {
            try {
                const response = await axios.get('http://localhost:5000/quizzes');
                setQuizzes(response.data);
            } catch (error) {
                console.error('Error fetching quizzes:', error);
            }
        };

        fetchQuizzes();
    }, []);

    return (
        <div className="quizzes-container">
            <header className="fixed-header">
                <h1>Quizzes</h1>
                <div className="button-container">
                    <Link className="btn btn-primary mr-2" to="/dashboard">Dashboard</Link>
                </div>
                <p>Welcome to the Quizzes page. Here you can take various quizzes to test your knowledge.</p>
            </header>
            <aside className="sidebar">
                <nav>
                    <Link to="/dashboard">Dashboard</Link>
                    <Link to="/quizzes">Quizzes</Link>
                    <Link to="/courses">Courses</Link>
                    <Link to="/profile">Profile</Link>
                    <Link to="/community">Community</Link>
                    <Link to="/contact">Contact</Link>
                </nav>
            </aside>
            <div className="whitish-region">
                <h2>Available Quizzes</h2>
                <ul className="list-group">
                    {quizzes.map((quiz) => (
                        <li key={quiz._id} className="list-group-item">
                            <Link to={`/quiz/${quiz._id}`}>{quiz.title}</Link>
                        </li>
                    ))}
                </ul>
            </div>
            <footer>
                <p>&copy; 2025 Cybersecurity Platform. All rights reserved.</p>
            </footer>
        </div>
    );
}

export default Quizzes;