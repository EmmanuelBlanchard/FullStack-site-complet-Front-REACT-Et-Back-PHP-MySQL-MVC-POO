import React from 'react';

const titleH1 = (props) => {
    let backgroundColor = props.bgColor ? props.bgColor : "bg-primary";
    let myCss = `border border-dark m-3 p-3 text-white text-center rounded ${backgroundColor}`;
    return <h1 className={myCss}>{props.children}</h1>
};

export default titleH1;
