import React from 'react';
import base from '../base';
import AjouterRecette from './AjouterRecette';

class Admin extends React.Component {

	state = {
		uid: null,
		owner: null
	};

	componentDidMount() {
		base.onAuth(user => {
			if (user) {
				this.traiterConnexion(null, { user })
			}
		})
	}

	traiterChangement = (event, key) => {
		const recette = this.props.recettes[key];
		const majRecette = {
			...recette,
			[event.target.name]: event.target.value
		};
		this.props.majRecette(key, majRecette);
	};

	connexion = (provider) => {
		console.log(`Tentative de connexion avec ${provider}`);
		base.authWithOAuthPopup(provider, this.traiterConnexion);
	};

	deconnexion = () => {
		base.unauth();
		this.setState({ uid: null });
	}

	traiterConnexion = (err, authData) => {

		if (err) {
			console.log(err);
			return;
		}

		// récupérer le nom de la boîte
		const boxRef = base.database().ref(this.props.pseudo);

		// Demander à firebase les données
		boxRef.once('value', (snapshot) => {

			const data = snapshot.val() || {};

			// Attribuer la box si elle n'est à personne
			if(!data.owner) {
				boxRef.set({
					owner: authData.user.uid
				})
			}

			this.setState({
				uid: authData.user.uid,
				owner: data.owner || authData.user.uid
			});

		});
	};

	renderLogin = () => {
		return (
				<div className="login">
					<h2>Connecte toi pour créer tes recettes !</h2>
					<button className="facebook-button" onClick={() => this.connexion('facebook')} >Me connecter avec Facebook</button>
					<button className="twitter-button" onClick={() => this.connexion('twitter')} >Me connecter avec Twitter</button>
				</div>
		)
	};

	renderAdmin = (key) => {
		const recette = this.props.recettes[key];
		return (
			<div className="card" key={key} >
				<form className="admin-form">

					<input type="text" name="nom" placeholder="Nom de la recette" value={recette.nom} onChange={(e) => this.traiterChangement(e, key)} />

					<input type="text" name="image" placeholder="Adresse de l'image" value={recette.image} onChange={(e) => this.traiterChangement(e, key)} />

					<textarea name="ingredients" rows="3" placeholder="Liste des ingrédients" value={recette.ingredients} onChange={(e) => this.traiterChangement(e, key)} ></textarea>

					<textarea name="instructions" rows="15" placeholder="Liste des instructions" value={recette.instructions} onChange={(e) => this.traiterChangement(e, key)} ></textarea>

				</form>
				<button onClick={() => this.props.supprimerRecette(key)} >Supprimer</button>
			</div>
		)
	};

	render() {
		const deconnexion = <button onClick={this.deconnexion} >Déconnexion!</button>

		// Check si il existe un propriétaire
		if (!this.state.uid) {
			return <div>{this.renderLogin()}</div>
		}

		//Check c'est le propriétaire de la boîte
		if (this.state.uid !== this.state.owner) {
			return (
				<div className="login">
					{this.renderLogin()}
					<p>⚠Tu n'es pas le propriétaire de cette boîte à recettes.</p>
				</div>
			)
		}

		const adminCards = Object
			.keys(this.props.recettes)
			.map(this.renderAdmin);

		return (
			<div className="cards">
				<AjouterRecette ajouterRecette={this.props.ajouterRecette} />
				{adminCards}
				<footer>
					<button onClick={this.props.chargerExemple} >Remplir</button>
				{deconnexion}
				</footer>
			</div>	
		)
	}

	static propTypes = {
		recettes: React.PropTypes.object.isRequired,
		chargerExemple: React.PropTypes.func.isRequired,
		ajouterRecette: React.PropTypes.func.isRequired,
		majRecette: React.PropTypes.func.isRequired,
		supprimerRecette: React.PropTypes.func.isRequired,
		pseudo: React.PropTypes.string.isRequired
	};

}

export default Admin;