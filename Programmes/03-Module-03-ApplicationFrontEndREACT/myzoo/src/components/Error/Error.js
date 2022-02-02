import React from 'react';
import TitleH1 from '../UI/Titles/TitleH1';

const error = (props) => (
    <>
        <TitleH1 bgColor="bg-danger">Erreur {props.type}</TitleH1>
        <div className="container">
            {props.children}
        </div>
    </>
);

export default error;
