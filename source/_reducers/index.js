/**
 * Redux Reducers
 * Most important!!!
 * Change state mainly
 */

import { combineReducers } from 'redux';

import { authentication } from './auth.reducer';
import { registration } from './reg.reducer';
import { users_admin } from './users.admin.reducer';
import { alert } from './alert.reducer';

const rootReducer = combineReducers({
    authentication,
    registration,
    users_admin,
    alert
});

export default rootReducer;