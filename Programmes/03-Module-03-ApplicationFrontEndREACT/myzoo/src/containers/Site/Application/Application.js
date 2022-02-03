import React, { Component } from 'react';
import TitleH1 from '../../../components/UI/Titles/TitleH1';
import axios from 'axios';
import Animal from './Animal/Animal';
import Button from '../../../components/UI/Button/Button';

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

    handleResetFamilyFilter = () => {
        this.setState({familyFilter:null})
    }
    
    handleResetContinentFilter = () => {
        this.setState({continentFilter:null})
    }

    render() {
        return (
            <>
                <TitleH1 bgColor="bg-success">Les animaux du parc</TitleH1>
                {
                    (this.state.familyFilter || this.state.continentFilter) && <span>Filtres : </span>
                }
                {
                    this.state.familyFilter &&
                    <Button 
                        typeBtn="btn-secondary"
                        clic={this.handleResetFamilyFilter}
                        >
                        {this.state.familyFilter} &nbsp;
                        <svg width="1em" height="1em" viewBox="0 0 16 16" className="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fillRule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                        </svg>
                    </Button>
                }
                {
                    this.state.continentFilter &&
                    <Button 
                        typeBtn="btn-secondary"
                        clic = {this.handleResetContinentFilter}
                        >{this.state.continentFilter} &nbsp;
                         <svg width="1em" height="1em" viewBox="0 0 16 16" className="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fillRule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                        </svg>
                        </Button>
                }
                <div className="container-fluid">
                    <div className="row no-gutters">
                        {
                            this.state.animals && 
                            this.state.animals.map(animal => {
                                return (
                                    <div className="col-12 col-md-6 col-xl-4" key={animal.id}>
                                        <Animal 
                                            {...animal} 
                                            familyFilter = {this.handleSelectFamily}
                                            continentFilter = {this.handleSelectContinent}
                                            />
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
