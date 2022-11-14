import React from 'react';

class Possesion extends React.Component {

constructor(props) {
  super(props);
  this.state = {
    users:{
        possesion:[]
    } 
  }
}

componentDidMount() {
  fetch('http://127.0.0.1:8000/userspossesion/' + user.id)
    .then((response) => {return response.json()})
    .then((data) => {
      // this.setState({users:data})
      console.log(data);
    })
}

render() {
  // console.log(this.state.users)
  // return <div>
  //     <table className="table">
  //     <thead>
  //       <tr className='text-center'>
  //         <th>Nom</th>
  //         <th>Prenom</th>
  //         <th>Email</th>
  //         <th>Adresse</th>
  //         <th>Tel</th>
  //       </tr>
  //     </thead>
  //     <tbody>
  //       {this.state.users.map((user) =>
  //       <tr className='text-center' key={users_id}>
  //         <td>{user.Nom}</td>
  //         <td>{user.Prenom}</td>
  //         <td>{user.Email}</td>
  //         <td>{user.Adresse}</td>
  //         <td>{user.Tel}</td>
  //       </tr>)}
  //     </tbody>
  //   </table>

  //   <table className="table">
  //     <thead>
  //       <tr className='text-center'>
  //         <th>Nom</th>
  //         <th>Type</th>
  //         <th>Valeur</th>
  //       </tr>
  //     </thead>
  //     <tbody>
  //       {this.state.users.map((user) =>
  //       <tr className='text-center' key={users_id}>
  //         <td>{user.Nom}</td>
  //         <td>{possesion.Type}</td>
  //         <td>{possesion.Valeur}</td>
  //       </tr>)}
  //     </tbody>
  //   </table>
  // </div>
}
}

export default Possesion;
