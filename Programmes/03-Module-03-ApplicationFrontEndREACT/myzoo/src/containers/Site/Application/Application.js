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
        famillyList : null,
        continentsList : null
    }

    loadData = () => {
        const family = this.state.familyFilter ? this.state.familyFilter : "-1";
        const continent = this.state.continentFilter ? this.state.continentFilter : "-1";
        axios.get(`https://localhost/coursFullStackSiteCompletFrontREACTBackPHPMySQLMVCPOO/04-Module04-BackEndPHP/front/animaux/${family}/${continent}`)
            .then(response => {
                // console.log(response);
                // console.log(response.data);
                this.setState({animals:Object.values(response.data)});
            })
            .catch(error => console.log(error));
    }

    componentDidMount = () => {
        this.loadData();
        axios.get(`https://localhost/coursFullStackSiteCompletFrontREACTBackPHPMySQLMVCPOO/04-Module04-BackEndPHP/front/familles`)
            .then(response => {
                // console.log(response);
                // console.log(response.data);
                this.setState({famillyList:Object.values(response.data)});
            })
            .catch(error => console.log(error));
        axios.get(`https://localhost/coursFullStackSiteCompletFrontREACTBackPHPMySQLMVCPOO/04-Module04-BackEndPHP/front/continents`)
            .then(response => {
                // console.log(response);
                // console.log(response.data);
                this.setState({continentsList:Object.values(response.data)});
            })
            .catch(error => console.log(error));
    }

    componentDidUpdate = (oldProps,oldState) => {
        if(oldState.familyFilter !== this.state.familyFilter || oldState.continentFilter !== this.state.continentFilter ) {
            this.loadData();
        }
    }

    handleSelectFamily = (idFamily) => {
        //console.log(`Famille, demande de l'id : ${idFamily}`);
        if(idFamily === "-1") this.handleResetFamilyFilter() 
        else this.setState({familyFilter : idFamily});
    }

    handleSelectContinent = (idContinent) => {
        //console.log(`Continent, demande de l'id : ${idContinent}`);
        if(idContinent === "-1") this.handleResetContinentFilter()
        else this.setState({continentFilter : idContinent});
    }

    handleResetFamilyFilter = () => {
        this.setState({familyFilter:null})
    }
    
    handleResetContinentFilter = () => {
        this.setState({continentFilter:null})
    }

    render() {
        let nameFamilyFilter="";
        if(this.state.familyFilter) {
            const numCaseFamilyFilter = this.state.famillyList.findIndex(family => {
                return family.famille_id === this.state.familyFilter;
            })
            nameFamilyFilter = this.state.famillyList[numCaseFamilyFilter].famille_libelle;
        }
        let nameContinentFilter="";
        if(this.state.continentFilter) {
            const numCaseContinentFilter = this.state.continentsList.findIndex(continent => {
                return continent.continent_id === this.state.continentFilter;
            })
            nameContinentFilter = this.state.continentsList[numCaseContinentFilter].continent_libelle;
        }

        return (
            <>
                <TitleH1 bgColor="bg-success">Les animaux du parc</TitleH1>
                <div className="container-fluid">
                    <span>Filtres : </span>
                    <select onChange={(event) => this.handleSelectFamily(event.target.value)}>
                    <option value="-1" selected={this.state.familyFilter === null && "selected"}>Familles</option>
                        {
                            this.state.famillyList && this.state.famillyList.map(famille => {
                                return <option 
                                    value={famille.famille_id}
                                    selected={this.state.familyFilter === famille.famille_id && "selected"}
                                    >{famille.famille_libelle}</option>
                            })
                        }
                    </select>
                    <select defaultValue="-1" onChange={(event) => this.handleSelectContinent(event.target.value)}>
                        <option value="-1" selected={this.state.continentFilter === null && "selected"}>Continents</option>
                        {
                            this.state.continentsList && this.state.continentsList.map(continent => {
                                return <option 
                                    value={continent.continent_id}
                                    selected={this.state.continentFilter === continent.continent_id && "selected"}
                                    >{continent.continent_libelle}</option>
                            })
                        }
                    </select>
                    {
                        this.state.familyFilter &&
                        <Button 
                            typeBtn="btn-secondary"
                            clic={this.handleResetFamilyFilter}
                            >
                            {nameFamilyFilter} &nbsp;
                            <svg width="1em" height="1em" viewBox="0 0 16 16" className="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fillRule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                            </svg>
                        </Button>
                    }
                    {
                        this.state.continentFilter &&
                        <Button 
                            typeBtn="btn-secondary"
                            clic={this.handleResetContinentFilter}
                            >{nameContinentFilter} &nbsp;
                            <svg width="1em" height="1em" viewBox="0 0 16 16" className="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fillRule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                            </svg>
                        </Button>
                    }
                </div>

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
