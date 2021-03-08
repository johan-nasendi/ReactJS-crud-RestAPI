import React, { useState, useEffect} from 'react'
import { useHistory, useParams } from 'react-router-dom';
import AppContainer  from './AppContainer';
import api from '../api';


const Edit = () => {
    const {id} = useParams();
    const history = useHistory();
    const [loading, setLoading] = useState(false);
    const [title, setTitle] = useState('');
    const [des, setDes] = useState('');
    
    const onEditSubmit = async () => {
        setLoading(true);
        try {
            await api.updatePost({
                title, des,
            }, id);
            history.push('/')
        } catch {
            alert('Failed to edit Post');
        } finally {
            setLoading(false);
        }
    };


    useEffect(() => {
        api.getOnePost(id).then(res => {
            const result = res.data;
            const post = result.data;
            setTitle(post.title);
            setDes(post.des);
        })

     }, []);


    return (
        <AppContainer title="EDIT DATA">
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
                    <button type="button" className="btn btn-success" onClick={onEditSubmit}disabled={loading}>  {loading ? 'LOADING...' : 'EDIT'} </button>
               </div>
            </form>
        </AppContainer>
    );
};

export default Edit;