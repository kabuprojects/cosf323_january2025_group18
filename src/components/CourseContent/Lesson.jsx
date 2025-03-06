import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import NavBar from '../navbar'; // Import the NavBar component

function Lesson() {
  const [isLessonCompleted, setIsLessonCompleted] = useState(false);

  const handleCheckboxChange = () => {
    setIsLessonCompleted(!isLessonCompleted);
  };

  return (
    <div className="lesson-page">
      <NavBar /> {/* Include the NavBar component */}
      <div className="lesson-content">
        <h1>Lesson</h1>
        <p>This is the lesson content.</p>
        <div className="form-check">
          <input
            type="checkbox"
            className="form-check-input"
            id="lessonCompleted"
            checked={isLessonCompleted}
            onChange={handleCheckboxChange}
          />
          <label className="form-check-label" htmlFor="lessonCompleted">
            I have completed this lesson
          </label>
        </div>
        {isLessonCompleted && (
          <Link to="/quiz" className="btn btn-primary mt-3">
            Take Quiz
          </Link>
        )}
      </div>
    </div>
  );
}

export default Lesson;