import React, { useState } from 'react';
import NavBar from '../navbar'; // Import the NavBar component

function Quiz() {
  const [score, setScore] = useState(null);
  const [answers, setAnswers] = useState({});

  const handleSubmit = (event) => {
    event.preventDefault();
    const correctAnswers = {
      question1: 'a',
      question2: 'b',
      // Add more correct answers as needed
    };
    let newScore = 0;
    Object.keys(correctAnswers).forEach((question) => {
      if (answers[question] === correctAnswers[question]) {
        newScore += 1;
      }
    });
    setScore(newScore);
  };

  const handleChange = (event) => {
    setAnswers({
      ...answers,
      [event.target.name]: event.target.value,
    });
  };

  return (
    <div className="quiz-page">
      <NavBar /> {/* Include the NavBar component */}
      <div className="quiz-content">
        <h1>Quiz</h1>
        {score !== null && (
          <div className="alert alert-info">
            Your score: {score}
          </div>
        )}
        <form onSubmit={handleSubmit}>
          <div className="form-group">
            <label htmlFor="question1">Question 1</label>
            <select
              id="question1"
              name="question1"
              className="form-control"
              onChange={handleChange}
            >
              <option value="">Select an answer</option>
              <option value="a">Answer A</option>
              <option value="b">Answer B</option>
              <option value="c">Answer C</option>
            </select>
          </div>
          <div className="form-group">
            <label htmlFor="question2">Question 2</label>
            <select
              id="question2"
              name="question2"
              className="form-control"
              onChange={handleChange}
            >
              <option value="">Select an answer</option>
              <option value="a">Answer A</option>
              <option value="b">Answer B</option>
              <option value="c">Answer C</option>
            </select>
          </div>
          {/* Add more questions as needed */}
          <button type="submit" className="btn btn-primary mt-3">
            Submit
          </button>
        </form>
      </div>
    </div>
  );
}

export default Quiz;