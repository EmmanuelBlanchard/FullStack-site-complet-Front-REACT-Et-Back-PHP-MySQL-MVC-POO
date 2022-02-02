import React, { Component } from 'react';
import TitleH1 from '../../../components/UI/Titles/TitleH1';

class Application extends Component {
    render() {
        return (
            <>
                <TitleH1 bgColor="bg-success">Les animaux du parc</TitleH1>
                <div className="container">
                    Page listant les animaux du zoo
                </div>
            </>
        );
    }
}

export default Application;
