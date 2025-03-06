import React, { useState } from 'react';
import { useHistory } from 'react-router-dom';
import { useTranslation } from 'react-i18next';

function Register() {
  const { t } = useTranslation();
  const history = useHistory();
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [confirmPassword, setConfirmPassword] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    // Handle registration logic here
    // After successful registration, redirect to the dashboard
    history.push('/dashboard');
  };

  return (
    <div className="container mt-5">
      <div className="register-container">
        <h2>{t('Register')}</h2>
        <p>{t('Create an account to access personalized features and track your progress.')}</p>
        <form onSubmit={handleSubmit}>
          <div className="form-group">
            <label htmlFor="email">{t('Email address')}</label>
            <input
              type="email"
              className="form-control"
              id="email"
              placeholder={t('Enter email')}
              value={email}
              onChange={(e) => setEmail(e.target.value)}
            />
          </div>
          <div className="form-group">
            <label htmlFor="password">{t('Password')}</label>
            <input
              type="password"
              className="form-control"
              id="password"
              placeholder={t('Password')}
              value={password}
              onChange={(e) => setPassword(e.target.value)}
            />
          </div>
          <div className="form-group">
            <label htmlFor="confirmPassword">{t('Confirm Password')}</label>
            <input
              type="password"
              className="form-control"
              id="confirmPassword"
              placeholder={t('Confirm Password')}
              value={confirmPassword}
              onChange={(e) => setConfirmPassword(e.target.value)}
            />
          </div>
          <button type="submit" className="btn btn-primary">{t('Register')}</button>
        </form>
      </div>
    </div>
  );
}

export default Register;