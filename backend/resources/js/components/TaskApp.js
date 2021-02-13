import axios from 'axios';
import React, {Component} from 'react';
import ReactDOM from 'react-dom';

const RenderRows = (props) => {
    return props.tasks.map(task => {
        return (
            <tr key={task.id}>
                <td>{task.id}</td>
                <td>{task.title}</td>
                <td>{task.deadline}</td>
                <td><button className="btn btn-secondary">complete</button></td>
            </tr>
        );
    });
}

export default class TaskApp extends Component
{
    constructor() {
        super();
        this.state = {
            tasks: [],
            title: null,
            deadline: null
        }
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    componentDidMount() {
        axios
        .get('/api/getTasks')
        .then((response) => {
            this.setState(
                {
                    tasks: response.data
                }
            );
        })
        .catch(error => {
            console.error(error);
        });
    }

    handleChange(event) {
        this.setState(
            {
                [event.target.name]: event.target.value
            }
        )
    }

    handleSubmit() {
        if (this.state.title === null || this.state.deadline === null) {
            return;
        }

        axios
        .post('/api/addTask', {
            title: this.state.title,
            deadline: this.state.deadline
        })
        .then((response) => {
            this.setState(
                {
                    tasks: response.data,
                    title: null,
                    deadline: null
                }
            );
        })
        .catch(error => {
            console.error(error);
        })
    }

    render() {
        return (
            <React.Fragment>
                <div className="form-group mt-4">
                    <p>new Task</p>
                    <label htmlFor="title">Title</label>
                    <input type="text" className="form-control" name="title" value={this.state.title} onChange={this.handleChange} />
                    <label htmlFor="deadline">Deadline</label>
                    <input type="datetime-local" className="form-control" name="deadline" value={this.state.deadline} onChange={this.handleChange} />
                </div>
                <button className="btn btn-primary" onClick={this.handleSubmit}>Register</button>
                <table className="table mt-5">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Deadline</td>
                            <td>Complete?</td>
                        </tr>
                    </thead>
                    <tbody>
                        <RenderRows tasks={this.state.tasks} />
                    </tbody>
                </table>
            </React.Fragment>
        );
    }
}

ReactDOM.render(
    <TaskApp />,
    document.getElementById('taskApp')
);
