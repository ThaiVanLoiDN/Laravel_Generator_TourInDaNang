@extends('frontend.layouts.layout')
@section('main-content')
<article id="post-278" class="post-278 tour type-tour has-post-thumbnail duration-day-tour travel-style-active-tours travel-style-sightseeing destination-da-nang">
    <header class="entry-header">
        <h1 class="entry-title">{{ $tours->name }}</h1>
        <div class="entry-meta">
            <span class="price">from <span>${{ $tours->price }}</span> </span>
            <i class="fa fa-clock-o"></i> 
            <a href="{{ route('frontend.tour.daytrips', $tours->daytour) }}">
                @php
                    echo ($tours->daytour == 1)?'Day tour':"$tours->daytour days";
                @endphp
            </a>
            <i class="fa fa-map-marker"></i> 
            <a href="">Da Nang</a>, </div>
    </header>
    <div class="entry-content clearfix">

        <!-- <div class="thumbox clearfix">
            <img src="./detail-tour_files/goddes-of-mercy-son-tra-m81qx5fna04v1z3gzit37tiraoj9gv89rxfjdmpava.jpg" class="thumb" alt="goddes of mercy son tra"
            ><img src="./detail-tour_files/banian-tree-son-tra-m81qx7bbno7fp70qojmcct1ohg9zw9fqg6qic6miiu.jpg" class="thumb" alt="banian tree on son tra">
            <img src="./detail-tour_files/son-tra-radar-station-m81qx7bbno7fp70qojmcct1ohg9zw9fqg6qic6miiu.jpg" class="thumb" alt="son tra radar station">
        </div> -->
        <p class="desc">{{ $tours->preview }}</p>
        <div id="message"></div>

        <div class="tabs">
            <ul class="tab-links">
                <li class="active"><a href="#itinerary">Itinerary</a>
                </li>
                <li><a href="#price">Price</a>
                </li>
                <li><a href="#inquiry">Enquiry</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="itinerary" class="tab active">
                    <h3>Tour Itinerary</h3>
                    {!! $tours->content !!}
                </div>

                <div id="price" class="tab">
                    <h4>Tour price</h4>
                    <p style="text-align: center;"><strong>Private tour Da Nang – Son Tra 1 day</strong>
                    </p>
                    <table>
                        <tbody>
                            <tr>
                                <td>No of travelers</td>
                                <td>2 pax</td>
                                <td>3-5 pax</td>
                                <td>6-8 pax</td>
                                <td>9 pax up</td>
                            </tr>
                            <tr>
                                <td>Price in USD/person</td>
                                <td>$59</td>
                                <td>$46</td>
                                <td>$38</td>
                                <td>$32</td>
                            </tr>
                        </tbody>
                    </table>
                    <p style="text-align: center;"><em><strong>Trekking optional</strong>: Additional US$15/person.</em>
                    </p>
                    <p>Not fit your requirement? Feel free to contact us to plan this trip and get the best possible price based upon your travel period and specific touring needs.</p>
                    <h4>Tour inclusive</h4>
                    <ul>
                        <li>Transportation by private a/c vehicle as per program</li>
                        <li>Lunch at local restaurant</li>
                        <li>Entrance fees</li>
                        <li>English speaking guide</li>
                        <li>Drink water</li>
                    </ul>
                    <h4>Tour exclusive</h4>
                    <ul>
                        <li>Other meals &amp; drinks</li>
                        <li>Personal expenses, tips</li>
                        <li>Travel insurance</li>
                    </ul>
                    <p>**<em>Guests may opt to use an elevator to go up the Marble Mountain (there’s only 1 and can accommodate about 10 pax) – fee on their own account ($1.5/pax)</em>
                    </p>
                </div>
                <div id="inquiry" class="tab">
                    <h4>Request a quote</h4>
                    <form class="enquiry-form" method="post" action="http://tourindanang.com/tour/danang-city-tour/">
                        <div id="ef_content">
                            <div>
                                <label for="tour_name">Tour Name: <strong>Da Nang – Son Tra Peninsula discover</strong>
                                </label>
                                <input type="hidden" name="c_tour" id="tour_name" size="50" maxlength="50" value="Da Nang – Son Tra Peninsula discover">
                            </div>
                            <div>
                                <label for="datepicker">Tour Date:</label>
                                <input type="text" id="datepicker" name="tour_date" size="20" value="" class="hasDatepicker">
                            </div>
                            <div>
                                <label for="ef_num_adult">Adults(&gt;12): </label>
                                <select id="ef_num_adult" name="num_adult">
                                    <option value="0" selected="selected">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="&gt;15">&gt;15</option>
                                </select>
                                <label for="ef_num_child">Children(2-11): </label>
                                <select id="ef_num_child" name="num_child">
                                    <option value="0" selected="selected">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <p></p>
                            <h4>Your contact information</h4>
                            <div>
                                <label for="ef_name">Your Name:</label>
                                <select id="name_title" name="name_title">
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                </select>
                                <input type="text" name="c_name" id="ef_name" size="30" maxlength="50" value="" required="">
                            </div>
                            <div>
                                <label for="ef_email">Your E-mail:</label>
                                <input type="text" name="email" id="ef_email" size="30" maxlength="50" value="" required="">
                            </div>
                            <div>
                                <label for="ef_phone">Phone Number:</label>
                                <input type="text" id="ef_phone" name="phone" size="20" value="">
                            </div>
                            <div>
                                <label for="ef_message">Additional requirements:</label>
                                <textarea name="message" id="ef_message" cols="50" rows="5" required=""></textarea>
                            </div>
                            <div>
                                <input type="submit" value="Submit" name="send" id="ef_send">
                            </div>
                        </div>
                    </form>
                    <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            $("#datepicker").datepicker({
                                dateFormat: "yy-mm-dd",
                                minDate: 0
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.tabs .tab-links a').on('click', function(e) {
                    var currentAttrValue = jQuery(this).attr('href');

                    // Show/Hide Tabs
                    jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

                    // Change/remove current tab to active
                    jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

                    e.preventDefault();
                });
                var element = jQuery('.info,.error,.success').clone(true);
                element.appendTo('#message');
            });
        </script>
    </div>
    <div class="yarpp-related">
        <h3>See also:</h3>
        <div class="yarpp-thumbnails-horizontal">
            @foreach ($arTours as $arTour)
            @if ($arTour->image == '')
                @php
                    $arTour->image = 'noimage.jpg';
                @endphp
            @endif
            <a class="yarpp-thumbnail" href="" title="{!! $arTour->name !!}">
                <img width="120" height="90" src="{{ $imageUrl }}/{!! $arTour->image !!}" class="attachment-yarpp-thumbnail size-yarpp-thumbnail wp-post-image" alt="{!! $arTour->name !!}" srcset="{{ $imageUrl }}/{!! $arTour->image !!}" sizes="(max-width: 120px) 100vw, 120px">
                <span class="yarpp-thumbnail-title">{!! $arTour->name !!}</span>
            </a>
            
            @endforeach

        </div>
    </div>
</article>
@stop