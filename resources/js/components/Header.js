import React from 'react';
import { BrowserRouter as Router, Route, Link, NavLink } from 'react-router-dom';
import MessageList from './MessageList';

const Header = () => (
    <Router>
        <div>
            <Route exact path="/" component={MessageList} />          
        </div>
    </Router>
)

export default Header