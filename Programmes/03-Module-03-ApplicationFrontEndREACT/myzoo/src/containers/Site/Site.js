import React, { Component } from 'react';
import NavBar from '../../components/UI/NavBar/NavBar';
import {Switch, Route} from 'react-router-dom';
import Home from './Home/Home';
import Error from '../../components/Error/Error';
import Footer from '../../components/UI/Footer/Footer';

class Site extends Component {
    render() {
        return (
            <>
                <div className="site">
                    <NavBar />
                    <Switch>
                        <Route path="/contact" exact render={() => <h1>Page de contact</h1>} />
                        <Route path="/" exact render={() => <Home />} />
                        <Route render={() => <Error type="404">La page n'existe pas</Error>} />
                    </Switch>
                    <div className="minSite"></div>
                </div>
                <Footer />
            </>
        );
    }
}

export default Site;
