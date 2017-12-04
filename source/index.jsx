/**
 * Website Index Router/Dir
 */
import React from 'react';
import ReactDOM from 'react-dom';
import {Provider} from 'react-redux';

import {configureFakeBackend, store} from './_helper';
import App from './components/App/App.jsx';

require('./styles/main.scss');

// TODO: Remove - setup fake backend
configureFakeBackend();

// Redux basic wrapper
const indexPage = (
  <Provider store={store}>
    <App/>
  </Provider>
);

ReactDOM.render(indexPage, document.getElementById('root-app'));
