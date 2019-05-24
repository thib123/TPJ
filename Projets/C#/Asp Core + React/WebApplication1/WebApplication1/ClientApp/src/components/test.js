import React, { Component } from 'react';

export class test extends Component {
    displayName = test.name

constructor(props) {
    super(props);
    this.num = 1;
    this.test = "lalala";
}


    render() {
        return (
            <div>
                <h1>test</h1>
                <p>test page react.</p>
                <div>{1 + 1}</div>
                <p>{this.num}</p>
                <p>{this.test}</p>
            </div>
        );
    }
}