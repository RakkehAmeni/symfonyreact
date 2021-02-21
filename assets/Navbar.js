import './styles/Navbar.css';
import React from 'react';
import bootstrap from '../node_modules/bootstrap/dist/css/bootstrap.min.css';
function Navbar () {
        return(
            <header class="header">
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="logo">
                                    <p>SymfonyReact Form Application</p>
                            </div>
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_user">
                                    
                                    <div><a href="/">Add User </a></div>
                                    <div><a href="/displayusers">Users list</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </header>  
        
);
}
export default  Navbar
