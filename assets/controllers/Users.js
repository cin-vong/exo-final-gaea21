import React from 'react';

class Users extends React.Component {

constructor(props) {
  super(props);
  this.state = {
    users:[],
  }
}

componentDidMount() {
  fetch('http://127.0.0.1:8000/users')
    .then((response) => {return response.json()})
    .then((data) => {
      this.setState({users:data})
      //console.log(data);
    })
}


deleteRow = id => {
  fetch('http://127.0.0.1:8000/usersdelete/' +id)
  .then((response) => {return response.json()})
  .then((data) => {
    this.setState({users:data})
    //console.log(data);
    })
}


render() {

  console.log(this.state.users)
  return <div>
    <table className="table">
      <thead>
        <tr className='text-center'>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Email</th>
          <th>Adresse</th>
          <th>Tel</th>
        </tr>
      </thead>
      <tbody>
        {this.state.users.map((user) =>
        <tr className='text-center' key={user.id}>
          <td><a href={"/userspossesion/" + user.id} >{user.Nom}</a></td>
          <td>{user.Prenom}</td>
          <td>{user.Email}</td>
          <td>{user.Adresse}</td>
          <td>{user.Tel}</td>
          <td><button className='btn btn-danger' type="button" 
          onClick={() => this.deleteRow(user.id)}>Supprimer
            </button></td>
        </tr>)}
      </tbody>
    </table>
  </div>
}
}

export default Users;
