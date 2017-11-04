import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Link } from 'react-router-dom';

import HomePage from './components/HomePage/HomePage.jsx';

require('./styles/main.scss');

const indexPage = (
    <Router>
        <div>
            <HomePage />
        </div>
    </Router>
);

ReactDOM.render(indexPage, document.getElementById('root'));
