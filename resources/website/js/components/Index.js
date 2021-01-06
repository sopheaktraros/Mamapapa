import React from 'react';
import ReactDOM from 'react-dom';
import {HashRouter,Switch,Route} from 'react-router-dom';
import Header from './partial/Header';
import Footer from './partial/Footer';
import Documentation from './documentation/Index';
import About from './about/Index';
import Produces from './view-all-produce/Index';
import Favourite from './wishlist/Index';

function Index() {
    return (
        <div>
            <HashRouter>
                <Header />
                    <Switch>

                    <Route path="/term" component={Documentation}/>
                    <Route path="/allproduces" component={Produces}/>
                    <Route path="/about" component={About}/>
                    <Route path="/favourite" component={Favourite}/>
                    </Switch>
                <Footer />
            </HashRouter>
        </div>
    );
}

export default Index;

if (document.getElementById('home')) {
    ReactDOM.render(<Index />, document.getElementById('home'));
}
