import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCoffee, faCheckCircle, faInbox } from '@fortawesome/free-solid-svg-icons'

class MessageList extends Component {
    
    constructor(props) {
        super(props)
        this.state = {
            items: [],
            stats: [],
            intervalID: 0,
            intervalStatID: 0
        }
    }

    componentDidMount() {
        this.getData();
        this.intervalID = setInterval(this.getData.bind(this), 1000);

        this.getStats();
        this.intervalStatID = setInterval(this.getStats.bind(this), 1000);

    }

    componentWillUnmount() {
        /*
          stop getData() from continuing to run even
          after unmounting this component
        */
        clearInterval(this.intervalID);
        clearInterval(this.intervalStatID);
    }

    getData() {
        axios.get('/messages').then(response => {
            this.setState({
                items: response.data
            })
        })
    }

    getStats() {
        axios.get('/stats').then(response => {
            this.setState({
                stats: response.data
            })
        })
    }

    render() {
        const { items } = this.state

        return (
            <div className='container py-4'>
                <h1>Network Log Manager</h1>
                <h3>(Displays 50 recent events only)</h3>
                <div className='row justify-content-center'>
                <div className="card-deck">
                    <div className="card bg-primary">
                    <div className="card-body text-center">
                        <h4><FontAwesomeIcon icon={faCoffee} /></h4>
                        <p className="card-text">Total No of Topics</p>
                        <h4>{this.state.stats.topics}</h4>
                    </div>
                    </div>
                    <div className="card bg-warning">
                    <div className="card-body text-center">
                    <   h4><FontAwesomeIcon icon={faCheckCircle} /></h4>
                        <p className="card-text">Total No of Sent Messages</p>
                        <h4>{this.state.stats.sent}</h4>
                    </div>
                    </div>
                    <div className="card bg-success">
                    <div className="card-body text-center">
                        <h4><FontAwesomeIcon icon={faInbox} /></h4>
                        <p className="card-text">Total No of Received Messages</p>
                        <h4>{this.state.stats.received}</h4>
                    </div>
                    </div>
                </div>
                    <div className='col-md-12'>

                        <Link className='btn btn-primary btn-sm mb-3' to='/start'>
                            Start Device
                        </Link>

                        <Link className='btn btn btn-danger btn-sm mb-3' to='/stop'>
                            Stop Device
                        </Link>

                        {this.state.items.length !== 0 ?

                            <table className="table table-hovered table-striped">
                                <thead>
                                    <tr>
                                        <th>Message ID</th>
                                        <th>Device ID</th>
                                        <th>Topic</th>
                                        <th>Message</th>
                                        <th>Date and Time</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {this.state.items.map((item, i) => (
                                        <tr key={i}>
                                            <td>{item.msg_id}</td>
                                            <td>{item.device_name}</td>
                                            <td>{item.topic_name}</td>
                                            <td>{(() => {
                                                    if (item.message=='On' && item.device_name=='SEN123')
                                                    {
                                                        return <p className="text-success">Sensor 1: Switched is On</p>
                                                    }else if (item.message=='Off' && item.device_name=='SEN123')
                                                    {
                                                        return <p className="text-danger">Sensor 1: Switched is Off</p>    
                                                    }else if (item.message<=50 && item.device_name=='SEN456')
                                                    {
                                                        return <p className="text-danger">Sensor 2 reached below threshold (less than 50): {item.message} </p>
                                                    }else if (item.message>=50 && item.device_name=='SEN456')
                                                    {
                                                        return <p className="text-primary">Sensor 2 reached high threshold (more than 50): {item.message} </p>    
                                                    }else{
                                                        return item.message
                                                    }
                                                })()}
                                            </td>
                                            <td>
                                                {new Intl.DateTimeFormat("en-GB", {
                                                year: "numeric",
                                                month: "long",
                                                day: "2-digit",
                                                hour: 'numeric',
                                                minute: 'numeric',
                                                second: 'numeric',
                                                fractionalSecondDigits: 2,
                                                // timeZoneName: 'short',
                                                }).format(item.timestamp)}
                                            </td>
                                        </tr>

                                    ))}
                                </tbody>

                            </table>

                            : <div> No Data!</div>}
                    </div>
                </div>
            </div>
        )
    }
}

export default MessageList