import React, { useState } from 'react';
import { BrowserRouter as Router, Route, Switch, Link, useHistory } from 'react-router-dom';
import Home from './components/Home';
import Contact from './components/Contact';
import Login from './components/Auth/Login';
import Register from './components/Auth/register';
import Dashboard from './components/Dashboard/Dashboard';
import Quizzes from './components/Dashboard/quizzes';
import Courses from './components/Dashboard/courses';
import CourseContent from './components/CourseContent/coursecontent';
import About from './components/About';
import Profile from './components/Profile';
import Community from './components/Community';
import Lesson from './components/CourseContent/Lesson';
import Quiz from './components/CourseContent/quiz';

export default function App() {
  const [isLoggedIn, setIsLoggedIn] = useState(false);

  const handleLogin = (email, password) => {
    // Implement your login logic here
    console.log('Logged in with email:', email);
    setIsLoggedIn(true);
  };

  return (
    <Router>
      <div>
        <header>
          <h1>Cybersecurity Platform</h1>
        </header>
        {isLoggedIn && (
          <aside className="sidebar">
            <nav>
              <Link to="/dashboard">Dashboard</Link>
              <Link to="/quizzes">Quizzes</Link>
              <Link to="/courses">Courses</Link>
              <Link to="/profile">Profile</Link>
              <Link to="/community">Community</Link>
            </nav>
          </aside>
        )}
        <main>
          <Switch>
            <Route path="/" exact component={Home} />
            <Route path="/contact" component={Contact} />
            <Route path="/login">
              <Login onLogin={handleLogin} />
            </Route>
            <Route path="/register" component={Register} />
            <Route path="/dashboard" component={Dashboard} />
            <Route path="/quizzes" component={Quizzes} />
            <Route path="/courses" component={Courses} />
            <Route path="/coursecontent" component={CourseContent} />
            <Route path="/about" component={About} />
            <Route path="/profile" component={Profile} />
            <Route path="/community" component={Community} />
            <Route path="/lesson" component={Lesson} />
            <Route path="/quiz" component={Quiz} />
          </Switch>
        </main>
        <footer>
          <p>&copy; 2025 Cybersecurity Platform. All rights reserved.</p>
        </footer>
      </div>
    </Router>
  );
}