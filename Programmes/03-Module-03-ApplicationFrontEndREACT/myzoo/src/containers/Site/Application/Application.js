import React, { Component } from 'react';
import TitleH1 from '../../../components/UI/Titles/TitleH1';
import axios from 'axios';
import Animal from './Animal/Animal';

class Application extends Component {
    state = {
        animals : null,
        familyFilter : null,
        continentFilter : null,
    }

    loadData = () => {
        const family = this.state.familyFilter ? this.state.familyFilter : "-1";
        const continent = this.state.continentFilter ? this.state.continentFilter : "-1";
        axios.get(`https://localhost/coursFullStackSiteCompletFrontREACTBackPHPMySQLMVCPOO/02-Module02-ServeurEtAPIREST/front/animaux/${family}/${continent}`)
            .then(response => {
                // console.log(response);
                // console.log(response.data);
                this.setState({animals:Object.values(response.data)});
            })
            .catch(error => console.log(error));
    }

    componentDidMount = () => {
        this.loadData();
    }

    componentDidUpdate = (oldProps,oldState) => {
        if(oldState.familyFilter !== this.state.familyFilter || oldState.continentFilter !== this.state.continentFilter ) {
            this.loadData();
        }
    }

    handleSelectFamily = (idFamily) => {
        //console.log(`Famille, demande de l'id : ${idFamily}`);
        this.setState({familyFilter : idFamily});
    }

    handleSelectContinent = (idContinent) => {
        //console.log(`Continent, demande de l'id : ${idContinent}`);
        this.setState({continentFilter : idContinent});
    }

    render() {
        return (
            <>
                <TitleH1 bgColor="bg-success">Les animaux du parc</TitleH1>
                <div className="container-fluid">
                    <div className="row no-gutters">
                        {
                            this.state.animals && 
                            this.state.animals.map(animal => {
                                return (
                                    <div className="col-12 col-md-6 col-xl-4" key={animal.id}>
                                        <Animal {...animal}
                                        familyFilter = {this.handleSelectFamily}
                                        continentFilter = {this.handleSelectContinent} />
                                    </div>
                                )
                            })
                        }
                    </div>
                </div>
            </>
        );
    }
}

export default Application;
