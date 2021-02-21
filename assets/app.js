import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom';
import Navbar from './Navbar';
import Form from './Form';

function App () {
        return(
            <div>
            <Navbar /> 
            <Form />
            </div>
);
}
ReactDOM.render(<App />,document.getElementById("root"));
