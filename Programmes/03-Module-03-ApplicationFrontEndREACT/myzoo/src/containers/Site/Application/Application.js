import React, { Component } from 'react';
import TitleH1 from '../../../components/UI/Titles/TitleH1';
import axios from 'axios';

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


    render() {
        return (
            <>
                <TitleH1 bgColor="bg-success">Les animaux du parc</TitleH1>
                <div className="container">
                    {
                        this.state.animals && 
                        this.state.animals.map(animal => {
                            return <h1 className="p-2 m-2">{animal.id} - {animal.nom}</h1>
                        })
                    }
                </div>
            </>
        );
    }
}

export default Application;
