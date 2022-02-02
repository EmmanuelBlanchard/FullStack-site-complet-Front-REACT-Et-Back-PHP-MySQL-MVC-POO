import React from 'react';
import logo from '../../../assets/images/logo.png';
import {NavLink} from 'react-router-dom';

const navbar = (props) => (
    <>  
        <nav className="navbar navbar-expand-lg navbar-dark bg-primary">
            <div className="container-fluid">
                <a className="navbar-brand" href="/">
                    <img src={logo} alt="logo du site My Zoo" width="50px" className="rounded" />
                </a>
                <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>

                <div className="collapse navbar-collapse" id="navbarColor01">
                    <ul className="navbar-nav me-auto">
                        <li className="nav-item">
                            <NavLink to="/" exact className="nav-link">Accueil</NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink to="/contact" exact className="nav-link">Contact</NavLink>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </>
);

export default navbar;
