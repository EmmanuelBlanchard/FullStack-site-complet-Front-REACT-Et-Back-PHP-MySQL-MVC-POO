import React, { Component } from 'react';
import TitleH1 from '../../../components/UI/Titles/TitleH1';
import Form from './Form/Form';
import axios from 'axios';

class Contact extends Component {
    componentDidMount = () => {
        document.title = "Page de contact";
    }

    handleSendMail = (message) => {
        axios.post("https://localhost/coursFullStackSiteCompletFrontREACTBackPHPMySQLMVCPOO/02-Module02-ServeurEtAPIREST/front/sendMessage",message)
            .then(response => {
                console.log(response);
            })
            .catch(error => {
                console.log(error)
            })
    }

    render() {
        return (
            <>
                <TitleH1 bgColor="bg-success">Contactez nous !</TitleH1>
                <div className="container">
                    <h2>Adresse : </h2>
                    xxxxxxxxxxxxxxxxxxxxxxxx
                    <h2>Téléphone : </h2>
                    00 00 00 00 00
                    <h2>Vous préfèrez nous écrire ? </h2>
                    <Form sendMail={this.handleSendMail} />
                </div>
            </>
        );
    }
}

export default Contact;
