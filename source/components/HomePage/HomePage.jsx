import React, {Component} from 'react';
import {BrowserRouter as Router, Route, Link} from 'react-router-dom';
import 'semantic-ui-css/semantic.min.css';
import {Header, Divider, Image, Button, Container} from 'semantic-ui-react';
import axios from 'axios';

import styles from './HomePage.scss';

class HomePage extends Component {

    render() {
        return(
            <div className="Home">
                <h1>Welcome to PittMoments!</h1>
            </div>
        )
    }
}

export default HomePage
