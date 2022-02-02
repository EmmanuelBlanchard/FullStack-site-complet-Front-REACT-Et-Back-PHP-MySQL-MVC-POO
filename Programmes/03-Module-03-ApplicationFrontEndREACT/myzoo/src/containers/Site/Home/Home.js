import React, { Component } from 'react';
import TitleH1 from '../../../components/UI/Titles/TitleH1';
import banner from '../../../assets/images/banderole.png';
import logo from '../../../assets/images/logo.png';

class Home extends Component {
    componentDidMount = () => {
        document.title = "Parc d'animaux MyZoo";
    }

    render() {
        return (
            <div>
                <img src={banner} alt="banderole du site My Zoo" className="img-fluid" />
                <TitleH1>Venez visiter le parc d'animaux MyZoo ! ! ! </TitleH1>
                <div className="container">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eveniet deserunt, modi odit doloribus doloremque saepe possimus similique numquam aliquid repellendus, ducimus obcaecati labore quos! Repudiandae laudantium incidunt dolore. Modi.
                    </p>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum doloremque fugit, voluptatem excepturi cumque aliquam perferendis vel rerum nobis velit mollitia ipsum ut totam iusto quae ipsam! Enim, nam natus.
                    </p>
                    <div className="row no-gutters align-items-center">
                        <div className="col-12 col-md-6">
                            <img src={logo} alt="log du site My Zoo" className="img-fluid" />
                        </div>
                        <div className="col-12 col-md-6">
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae accusantium blanditiis, perspiciatis laboriosam, sed obcaecati architecto pariatur magnam debitis voluptates voluptatibus dolore, perferendis velit enim quo alias est cum maxime? Nihil hic accusantium necessitatibus porro recusandae error molestiae alias distinctio ipsam! Iste delectus, nam, laborum provident soluta facilis voluptatibus eos consequuntur aspernatur nobis labore in possimus aliquid dolorem ab cumque earum quod at odit! Dicta molestias dignissimos neque sit totam, fugiat assumenda officia labore quaerat! Assumenda rerum minima cumque magni officiis eius inventore. Quaerat suscipit iste, voluptas maxime sapiente, mollitia quae quas neque ex temporibus illo qui facere odit distinctio eaque perspiciatis! Maxime minus quas possimus sequi velit ut, saepe ea quae dignissimos iusto perferendis beatae, aliquam odit illum vero repellendus, eligendi quisquam maiores! Amet velit totam nemo facilis ipsam aliquid, ea doloremque vero deleniti, nesciunt deserunt. Deserunt mollitia quaerat labore quae quam dolor rem ex obcaecati vero, minima eos, assumenda, deleniti tempora repellendus? Tempora, eum expedita. Quia incidunt expedita itaque ullam nam porro, facilis cum in perspiciatis nihil ipsa enim voluptates dicta voluptatum amet exercitationem aperiam, laboriosam provident unde architecto necessitatibus natus id aspernatur. Eum provident pariatur asperiores dolor esse iure, optio facere exercitationem soluta? Impedit minus et debitis laboriosam distinctio dolorem enim ratione libero! Ab culpa odit provident qui excepturi. Provident aperiam nobis autem aut voluptatibus. Nostrum necessitatibus placeat ipsam, iure exercitationem ducimus dolor quaerat. Facilis consequatur optio eius magni, quas quis quam tempore veritatis, aliquam, hic magnam? Aspernatur quibusdam reiciendis iure ipsum laudantium ratione accusamus maiores vitae.
                            </p>
                        </div>
                        <div className="col-12 col-md-6">
                            <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam nisi molestiae quae velit tempora nostrum nemo quod culpa repellat quos iste accusantium natus ipsam minus ex, perferendis, laudantium perspiciatis est! Tempore perspiciatis doloremque neque, architecto amet doloribus quo corporis quia aspernatur. Libero alias aperiam rerum quibusdam voluptate amet facere voluptatibus velit expedita! Eveniet quos inventore perspiciatis aperiam qui earum dicta! Fugit asperiores rem neque voluptatum, ducimus laboriosam? Dignissimos culpa, repellendus praesentium aspernatur aut illo vero exercitationem. Sunt ipsam suscipit libero expedita ducimus doloremque possimus velit distinctio deserunt commodi repellat, cumque qui quas quibusdam, natus odio sequi earum ea! Iste saepe corporis repudiandae voluptatum nesciunt modi dignissimos totam, quae nam fugiat dolorum corrupti! Blanditiis beatae tempora inventore sed aliquam a aut numquam odit vero delectus assumenda magni asperiores expedita nesciunt totam modi, praesentium ea? Nihil sequi quidem nam ipsam facilis doloribus iure enim fuga pariatur excepturi eveniet voluptate, tempora accusantium quae rerum voluptates omnis. Dolorum architecto autem labore totam aliquid, optio ipsam tenetur corporis quia! Laborum, nihil quo. Reprehenderit officiis provident ducimus. Maiores cumque natus soluta dolor nemo inventore quae repellat ipsam enim, iure aut voluptate, unde nam nihil asperiores repudiandae saepe provident quod odit totam debitis vero eos suscipit sed. Vero quae porro sequi voluptatibus fugit quia aut, impedit officiis iusto dignissimos minima nobis aliquam facilis, corrupti maiores ad quas, assumenda id aperiam. Illo eius aliquid, praesentium perspiciatis ut inventore sequi quo cupiditate eos non corrupti architecto porro tenetur nesciunt quasi iusto quos totam et ullam expedita laborum. Perspiciatis, officia!
                            </p>
                        </div>
                        <div className="col-12 col-md-6">
                            <img src={logo} alt="log du site My Zoo" className="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Home;
