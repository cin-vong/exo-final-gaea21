return (
    <div className="container w-50">
        <Link to="/" className="btn btn-primary mb-3">Retour</Link>
            <h1 className="text-center my-4">Ajouter un utilisateur</h1>

            <form onSubmit={(e)=>handleSubmit(e)} className="bg-light p-5 shadow rounded">
                <label htmlFor="nom">Nom</label>
                <input ref={addInput} type="text" className="form-control mb-3" required ></input>

                <label htmlFor="prenom">Prenom</label>
                <input ref={addInput} type="text" className="form-control mb-3" required ></input>

                <label htmlFor="email">Email</label>
                <input ref={addInput} type="email" className="form-control mb-3" required ></input>

                <label htmlFor="adresse">Adresse</label>
                <input ref={addInput} type="text" className="form-control mb-3" required ></input>

                <label htmlFor="number">Télephone</label>
                <input ref={addInput} type="number" className="form-control" required ></input>
                
            </form>
    </div>
)