import React, { Component } from 'react';
import TitleH1 from '../../../components/UI/Titles/TitleH1';
import axios from 'axios';
import Animal from './Animal/Animal';

class Application extends Component {
    state = {
        animals : null
    }

    componentDidMount = () => {
        axios.get(`https://localhost/coursFullStackSiteCompletFrontREACTBackPHPMySQLMVCPOO/02-Module02-ServeurEtAPIREST/front/animaux`)
            .then(response => {
                // console.log(response);
                // console.log(response.data);
                this.setState({animals:Object.values(response.data)});
            })
            .catch(error => console.log(error));
    }

    handleSelectFamily = (idFamily) => {
        console.log(`Famille, demande de l'id : ${idFamily}`);
    }

    handleSelectContinent = (idContinent) => {
        console.log(`Continent, demande de l'id : ${idContinent}`);
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
