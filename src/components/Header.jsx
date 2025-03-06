import React from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';

const Header = () => {
  const { t } = useTranslation();

  return (
    <nav className="navbar navbar-expand-lg navbar-light bg-light">
      <Link className="navbar-brand" to="/">{t('Cybersecurity Platform')}</Link>
      <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span className="navbar-toggler-icon"></span>
      </button>
      <div className="collapse navbar-collapse" id="navbarNav">
        <ul className="navbar-nav">
          <li className="nav-item">
            <Link className="nav-link" to="/">{t('Home')}</Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/features">{t('Features')}</Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/pricing">{t('Pricing')}</Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/contact">{t('Contact')}</Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/login">{t('Login')}</Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/register">{t('Register')}</Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/about">{t('About')}</Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/dashboard">{t('Dashboard')}</Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/quizzes">{t('Quizzes')}</Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/coursecontent">{t('Course Content')}</Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/profile">{t('Profile')}</Link>
          </li>
          <li className="nav-item">
            <Link className="nav-link" to="/community">{t('Community')}</Link>
          </li>
        </ul>
      </div>
    </nav>
  );
};

export default Header;