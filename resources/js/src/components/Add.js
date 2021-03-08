import React, { useState} from 'react'
import { useHistory } from 'react-router-dom';
import AppContainer  from './AppContainer';
import api from '../api';


const Add = () => {
    const history = useHistory();
    const [loading, setLoading] = useState(false);
    const [title, setTitle] = useState('');
    const [des, setDes] = useState('');
    
    const onAddSubmit = async () => {
        setLoading(true);
        try {
            await api.addPost({
                title, des,
            })
            history.push('/home')
        } catch {
            alert('Failed to add Post');
        } finally {
            setLoading(false);
        }
    };

    return (
        <AppContainer title="ADD DATA">
            <form>
                <div className="form-group">
                    <label>Name</label>
                    <input className="form-control" type="text" value={title} onChange={e =>setTitle(e.target.value)} />
                </div>
                <div className="form-group">
                    <label>Job</label>
                    <textarea className="form-control" value={des} onChange={e =>setDes(e.target.value)}> </textarea>
                </div>
                <div className="form-group">
                    <button type="button" className="btn btn-success" onClick={onAddSubmit}disabled={loading}>  {loading ? 'LOADING...' : 'ADD'} </button>
               </div>
            </form>
        </AppContainer>
    );
};

export default Add;