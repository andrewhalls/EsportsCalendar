@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Broadcasts
@stop

{{-- Content --}}
@section('content')

<style>
    .row .programme {
        height: 50px;
        float: left;
        color: #FFFFFF;
        font-size: 11px;
        font-weight: bold;
        overflow: hidden;
        position: relative;
        white-space: nowrap;
        border: 1px solid black;
    }

    .row:nth-child(odd)>div {
        background-color: #f5f5f5
    }
</style>

<h4>Available Groups</h4>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <th>Game</th>
                <th>Title</th>
                <th>Start Time</th>
                <th>End Time</th>
                </thead>
                <tbody>
                @foreach ($broadcasts as $broadcast)
                <tr class="{{ ($broadcast->isActive() ? 'active' : '') }}">
                    <td><a href="game/{{ $broadcast->game->id }}">{{ $broadcast->game->name }}</a></td>
                    <td>{{ $broadcast->title }}</td>
                    <td>{{ $broadcast->start_at }}</td>
                    <td>{{ $broadcast->end_at }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <button class="btn btn-primary" onClick="location.href='{{ URL::to('groups/create') }}'">New Group</button>
    </div>
</div>

<div id="grid">

<div id="programmes" class="ui-sortable" unselectable="on">
    <div style="clear:both;"></div>
    @foreach ($broadcasts as $broadcast)
    <div id="channel-1" class="row">
        <div class="logo col-md-2"><a href="/watch.html?c=1" title="BBC One"><img
                    src="http://static.cdn.tvcatchup.com/20140123/images/channels/home-channels/enabled/hp_channel_1.png"
                    alt="BBC One" style="width: 63px; height:50px;"></a></div>
        <div class="programmes col-md-10">
            <div class="programme" style="width: 120px; background: url('http://static.cdn.tvcatchup.com/20140123/images/themes/grey/guide_row_now.png') no-repeat -0px 0px;"">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/320950"><span
                            class="guide-programme">The One Show</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">19:00 - 19:30</font></div>
                <div class="tip hide" style="display: none;">The One Show<br><font color="#5c5c5c">19:00 -
                        19:30</font><br>Chris Evans and Alex Jones present the final show of the week, featuring
                    the usual mix of celebrity guests and stories about people in extraordinary
                    circumstances.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">1</div>
                <div class="start hide">1394823600</div>
                <div class="end hide">1394825400</div>
            </div>
        </div>
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a style="color: #ffffff;" href="/programme/320246">A
                        Question of Sport</a></div>
                <div class="subtitle" style="width: 105px;"><a class="watchNow-guide" href="/watch.html?c=1"
                                                               style="color: #9CEF4A ;">Watch Now</a></div>
                <div class="tip hide" style="display: none;">A Question of Sport<br><font color="#5c5c5c">19:30
                        - 20:00</font><br>Sue Barker hosts the light-hearted quiz, with Matt Dawson and Phil
                    Tufnell heading teams of celebrities in a test of their sporting knowledge.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">1</div>
                <div class="start hide">1394825400</div>
                <div class="end hide">1394827200</div>
            </div>
        </div>
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/320951"><span
                            class="guide-programme">EastEnders</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">20:00 - 20:30</font></div>
                <div class="tip hide" style="display: none;">EastEnders<br><font color="#5c5c5c">20:00 -
                        20:30</font><br>Carol's suspicions are aroused when Mo lets slip that Kat's actions may
                    involve Stacey - and she soon realises others have not been completely honest with her.
                    Meanwhile, Kat is shocked by the ease with which Max can lie to his family - but she knows
                    that she herself is in way too deep. Jane feels threatened when she comes face to face with
                    an intruder at the restaurant, and Patrick persuades Fat Boy to invite Dot's grandson round
                    again.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">1</div>
                <div class="start hide">1394827200</div>
                <div class="end hide">1394829000</div>
            </div>
        </div>
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/320952"><span
                            class="guide-programme">Room 101</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">20:30 - 21:00</font></div>
                <div class="tip hide" style="display: none;">Room 101<br><font color="#5c5c5c">20:30 -
                        21:00</font><br>Frank Skinner presents the comedy panel show, which sees The Great
                    British Bake Off presenter Sue Perkins, Strictly Come Dancing judge Bruno Tonioli and TV
                    host Steve Jones compete to have their pet hates banished for ever. Their gripes include
                    catalogues, flat-pack furniture and gym etiquette. Last in the series.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">1</div>
                <div class="start hide">1394829000</div>
                <div class="end hide">1394830800</div>
            </div>
        </div>
        <div class="programme" style="width: 240px;">
            <div class="line" style="width: 240px;">
                <div class="title" style="width: 225px;"><a class="guide-programme"
                                                            href="/programme/320953"><span
                            class="guide-programme">Jonathan Creek</span></a></div>
                <div class="subtitle" style="width: 225px;"><font color="#5c5c5c">21:00 - 22:00</font></div>
                <div class="tip hide" style="display: none;">Jonathan Creek<br><font color="#5c5c5c">21:00 -
                        22:00</font><br>Just when it seemed the Creeks couldn't be any happier, a cloud appears
                    on the horizon in the shape of a glamorous weather forecaster who leads Polly to believe she
                    and her husband share a rather unusual and intimate secret. As if their lives weren't
                    complicated enough, the couple's cleaning lady embarks on an evening with a hunky male
                    escort, leading to a chain of events involving the disposal of a dead body and an act of
                    teleportation that leaves even Jonathan lost for words. And what is going on behind the net
                    curtains of parish magazine editor Horace Greeley, whose twin sisters Heidi and Laurel seem
                    to be hiding a mysterious secret? Alan Davies and Sarah Alexander star, with Josie Lawrence,
                    June Whitfield and John Bird. Last in the series.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">1</div>
                <div class="start hide">1394830800</div>
                <div class="end hide">1394834400</div>
            </div>
        </div>
        <div class="programme" style="width: 1px;">
            <div class="line" style="width: 1px;">
                <div class="title" style="width: -15px;"><a class="guide-programme"
                                                            href="/programme/320954"><span
                            class="guide-programme">BBC News</span></a></div>
                <div class="subtitle" style="width: -15px;"><font color="#5c5c5c">22:00 - 22:25</font></div>
                <div class="tip hide" style="display: none;">BBC News<br><font color="#5c5c5c">22:00 -
                        22:25</font><br><span style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">1</div>
                <div class="start hide">1394834400</div>
                <div class="end hide">1394835900</div>
            </div>
        </div>
    </div>
</div>
@endforeach
<div id="channel-2" class="row">
    <div class="logo col-md-2"><a href="/watch.html?c=2" title="BBC Two"><img
                src="http://static.cdn.tvcatchup.com/20140123/images/channels/home-channels/enabled/hp_channel_2.png"
                alt="BBC Two" style="width: 63px; height:50px;"></a></div>
    <div class="programmes col-md-10">
        <div class="programme"
             style="width: 240px; background: url('http://static.cdn.tvcatchup.com/20140123/images/themes/grey/guide_row_now.png') no-repeat -0px 0px;">
            <div class="line" style="width: 240px;">
                <div class="title" style="width: 225px;"><a style="color: #ffffff;" href="/programme/320977">Antiques
                        Road Trip</a></div>
                <div class="subtitle" style="width: 225px;"><a class="watchNow-guide" href="/watch.html?c=2"
                                                               style="color: #9CEF4A ;">Watch Now</a></div>
                <div class="tip hide" style="display: none;">Antiques Road Trip<br><font color="#5c5c5c">19:00 -
                        20:00</font><br>Antiques experts David Harper and Catherine Southon go on a buying spree
                    through central Wales on the third leg of their road trip from Lancashire to Devon. They
                    then get a taste for one of Gloucester's finest edibles as they head for auction.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">2</div>
                <div class="start hide">1394823600</div>
                <div class="end hide">1394827200</div>
            </div>
        </div>
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/320978"><span
                            class="guide-programme">Mastermind</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">20:00 - 20:30</font></div>
                <div class="tip hide" style="display: none;">Mastermind<br><font color="#5c5c5c">20:00 -
                        20:30</font><br>John Humphrys welcomes five more contenders to the famous black chair
                    for the second semi-final. Their specialist subjects are Dutch artist Vincent van Gogh, the
                    Black Death, the musketeer novels of Alexandre Dumas, British military commander Field
                    Marshal William Slim and the Eurovision Song Contest, before they each have a chance to
                    demonstrate their general knowledge.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">2</div>
                <div class="start hide">1394827200</div>
                <div class="end hide">1394829000</div>
            </div>
        </div>
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/320979"><span
                            class="guide-programme">Gardeners' World</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">20:30 - 21:00</font></div>
                <div class="tip hide" style="display: none;">Gardeners' World<br><font color="#5c5c5c">20:30 -
                        21:00</font><br>Monty Don tackles the problem of box blight in his garden at Longmeadow,
                    which means taking drastic action for long-term results. Joe Swift visits a gardener trying
                    to create a haven of beauty against the odds on the windswept Cornish coast, Carol Klein
                    meets one of the country's leading cyclamen experts and uncovers just how easy they are to
                    grow, and the programme meets an amateur cultivating an array of sweet peas to make fragrant
                    and colourful displays.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">2</div>
                <div class="start hide">1394829000</div>
                <div class="end hide">1394830800</div>
            </div>
        </div>
        <div class="programme" style="width: 240px;">
            <div class="line" style="width: 240px;">
                <div class="title" style="width: 225px;"><a class="guide-programme"
                                                            href="/programme/320980"><span
                            class="guide-programme">I Was There: The Great War Interviews</span></a></div>
                <div class="subtitle" style="width: 225px;"><font color="#5c5c5c">21:00 - 22:00</font></div>
                <div class="tip hide" style="display: none;">I Was There: The Great War Interviews<br><font
                        color="#5c5c5c">21:00 - 22:00</font><br>In the early 1960s, the BBC spoke to almost 300
                    people about their experiences during the First World War for landmark series The Great War,
                    but only a fraction of the interviews were broadcast. This programme airs a selection of the
                    original material, most of which has never been screened before, with recollections of the
                    horrors of artillery bombardment and fleeting outbreaks of peace on the battlefield, as well
                    as the stories of those on the home front waiting for news of their loved ones. Narrated by
                    Samuel West.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">2</div>
                <div class="start hide">1394830800</div>
                <div class="end hide">1394834400</div>
            </div>
        </div>
        <div class="programme" style="width: 1px;">
            <div class="line" style="width: 1px;">
                <div class="title" style="width: -15px;"><a class="guide-programme"
                                                            href="/programme/320981"><span
                            class="guide-programme">QI</span></a></div>
                <div class="subtitle" style="width: -15px;"><font color="#5c5c5c">22:00 - 22:30</font></div>
                <div class="tip hide" style="display: none;">QI<br><font color="#5c5c5c">22:00 -
                        22:30</font><br>Sue Perkins, Ross Noble and David Mitchell join regular panellist Alan
                    Davies on the comedy quiz. Host Stephen Fry asks a range of fiendish questions on the topic
                    of knits, knots and other things starting with the letter `K', with points being awarded for
                    interesting answers as well as correct ones.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">2</div>
                <div class="start hide">1394834400</div>
                <div class="end hide">1394836200</div>
            </div>
        </div>
    </div>
</div>
<div id="channel-3" class="row">
    <div class="logo col-md-2"><a href="/watch.html?c=3" title="ITV1"><img
                src="http://static.cdn.tvcatchup.com/20140123/images/channels/home-channels/enabled/hp_channel_3.png"
                alt="ITV1" style="width: 63px; height:50px;"></a></div>
    <div class="programmes col-md-10">
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/321002"><span
                            class="guide-programme">Emmerdale</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">19:00 - 19:30</font></div>
                <div class="tip hide" style="display: none;">Emmerdale<br><font color="#5c5c5c">19:00 -
                        19:30</font><br>Chas finds Belle in the Woolpack backroom and tries to persuade her not
                    to confess to the police, while Zak grows increasingly suspicious of Lisa's behaviour.
                    Elsewhere, Alicia orders Jacob to pay for damaging Noah's phone, unaware he has given all
                    his savings to Leyla, and Ruby's baby hopes are dashed yet again - but Seb could provide a
                    solution.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">3</div>
                <div class="start hide">1394823600</div>
                <div class="end hide">1394825400</div>
            </div>
        </div>
        <div class="programme"
             style="width: 120px; background: url('http://static.cdn.tvcatchup.com/20140123/images/themes/grey/guide_row_now.png') no-repeat -120px 0px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a style="color: #ffffff;" href="/programme/321003">Coronation
                        Street</a></div>
                <div class="subtitle" style="width: 105px;"><a class="watchNow-guide" href="/watch.html?c=3"
                                                               style="color: #9CEF4A ;">Watch Now</a></div>
                <div class="tip hide" style="display: none;">Coronation Street<br><font color="#5c5c5c">19:30 -
                        20:00</font><br>Carla tells Michelle she doesn't want children as she awaits the results
                    of her pregnancy test, while Steve pretends not to have heard when Tony invites him for a
                    birthday drink. Sophie questions Maddie about a bottle of vodka that has been stolen from
                    the corner shop, and Fiz is intrigued to hear that Todd has a secret boyfriend, and is later
                    bemused by a strange cabinet Roy puts in the cafe.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">3</div>
                <div class="start hide">1394825400</div>
                <div class="end hide">1394827200</div>
            </div>
        </div>
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/321004"><span
                            class="guide-programme">Student Nurses: Bedpans and Bandages</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">20:00 - 20:30</font></div>
                <div class="tip hide" style="display: none;">Student Nurses: Bedpans and Bandages<br><font
                        color="#5c5c5c">20:00 - 20:30</font><br>Mental-health nurse Kelsie faces a phobia,
                    first-year trainee Kelly comes to the end of her placement and mature student Dany bids a
                    final farewell to a special patient. Documentary following men and women at different stages
                    of their nursing training in Birmingham and Manchester, revealing the pressures, emotions
                    and challenges they face, both in the classrooms and on the wards.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">3</div>
                <div class="start hide">1394827200</div>
                <div class="end hide">1394829000</div>
            </div>
        </div>
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/321005"><span
                            class="guide-programme">Coronation Street</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">20:30 - 21:00</font></div>
                <div class="tip hide" style="display: none;">Coronation Street<br><font color="#5c5c5c">20:30 -
                        21:00</font><br>Tina waits nervously in the Rovers for Peter to return from telling
                    Carla about their affair, while Fiz's suspicions are aroused when Todd makes quiet digs at
                    Marcus. Tony takes Steve to one side and asks him if he has a problem with him seeing Liz,
                    and Maddie kisses Sophie and suggests they go to bed. Fiz tells Roy that Hayley's ashes are
                    ready for collection and offers to accompany him to the crematorium.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">3</div>
                <div class="start hide">1394829000</div>
                <div class="end hide">1394830800</div>
            </div>
        </div>
        <div class="programme" style="width: 240px;">
            <div class="line" style="width: 240px;">
                <div class="title" style="width: 225px;"><a class="guide-programme"
                                                            href="/programme/321006"><span
                            class="guide-programme">Edge of Heaven</span></a></div>
                <div class="subtitle" style="width: 225px;"><font color="#5c5c5c">21:00 - 22:00</font></div>
                <div class="tip hide" style="display: none;">Edge of Heaven<br><font color="#5c5c5c">21:00 -
                        22:00</font><br>Having walked out on Michelle, Alfie is now anxious to patch things up
                    with her - until the thought occurs to him that Carly might want him back. Confused and
                    worried about what the future holds, the sofa salesman goes to his father - who has just
                    turned up out of the blue - for some much-needed relationship advice. Comedy drama, starring
                    Blake Harrison.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">3</div>
                <div class="start hide">1394830800</div>
                <div class="end hide">1394834400</div>
            </div>
        </div>
        <div class="programme" style="width: 1px;">
            <div class="line" style="width: 1px;">
                <div class="title" style="width: -15px;"><a class="guide-programme"
                                                            href="/programme/321007"><span
                            class="guide-programme">ITV News at Ten and Weather</span></a></div>
                <div class="subtitle" style="width: -15px;"><font color="#5c5c5c">22:00 - 22:30</font></div>
                <div class="tip hide" style="display: none;">ITV News at Ten and Weather<br><font
                        color="#5c5c5c">22:00 - 22:30</font><br><span
                        style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">3</div>
                <div class="start hide">1394834400</div>
                <div class="end hide">1394836200</div>
            </div>
        </div>
    </div>
</div>
<div id="channel-4" class="row">
    <div class="logo col-md-2"><a href="/watch.html?c=4" title="Channel 4"><img
                src="http://static.cdn.tvcatchup.com/20140123/images/channels/home-channels/enabled/hp_channel_4.png"
                alt="Channel 4" style="width: 63px; height:50px;"></a></div>
    <div class="programmes col-md-10">
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/321029"><span
                            class="guide-programme">Channel 4 News</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">19:00 - 19:30</font></div>
                <div class="tip hide" style="display: none;">Channel 4 News<br><font color="#5c5c5c">19:00 -
                        19:30</font><br>Including sport and weather.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">4</div>
                <div class="start hide">1394823600</div>
                <div class="end hide">1394825400</div>
            </div>
        </div>
        <div class="programme"
             style="width: 120px; background: url('http://static.cdn.tvcatchup.com/20140123/images/themes/grey/guide_row_now.png') no-repeat -120px 0px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a style="color: #ffffff;" href="/programme/321030">Paralympic
                        Winter Games Highlights</a></div>
                <div class="subtitle" style="width: 105px;"><a class="watchNow-guide" href="/watch.html?c=4"
                                                               style="color: #9CEF4A ;">Watch Now</a></div>
                <div class="tip hide" style="display: none;">Paralympic Winter Games Highlights<br><font
                        color="#5c5c5c">19:30 - 20:00</font><br>Jonathan Edwards and Ade Adepitan look back at
                    the seventh day of events in Sochi and Krasnaya Polyana, Russia, which included alpine
                    skiing and biathlon. The women's slalom was the focus of attention at the Rosa Khutor Alpine
                    Resort, where three gold medals were decided, while the men's and women's snowboardcross
                    made its Winter Paralympics debut at the Rosa Khutor Extreme Park. Plus, the final biathlon
                    events of the Games - the men's 15km and women's 12.5km - took place at the Laura Biathlon
                    &amp; Ski Complex.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">4</div>
                <div class="start hide">1394825400</div>
                <div class="end hide">1394827200</div>
            </div>
        </div>
        <div class="programme" style="width: 240px;">
            <div class="line" style="width: 240px;">
                <div class="title" style="width: 225px;"><a class="guide-programme"
                                                            href="/programme/321031"><span
                            class="guide-programme">Marvel's Agents of SHIELD</span></a></div>
                <div class="subtitle" style="width: 225px;"><font color="#5c5c5c">20:00 - 21:00</font></div>
                <div class="tip hide" style="display: none;">Marvel's Agents of SHIELD<br><font color="#5c5c5c">20:00
                        - 21:00</font><br>The comic-book drama returns after a mid-season break. As the agents
                    organise a full-scale hunt for their missing leader, Skye is forced to take action alone.
                    Coulson uncovers vital information about the mystery of his death during the Chitauri
                    invasion but, with Centipede out for blood, this knowledge may come at the cost of one of
                    the team. Guest starring Saffron Burrows.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">4</div>
                <div class="start hide">1394827200</div>
                <div class="end hide">1394830800</div>
            </div>
        </div>
        <div class="programme" style="width: 240px;">
            <div class="line" style="width: 240px;">
                <div class="title" style="width: 225px;"><a class="guide-programme"
                                                            href="/programme/321032"><span
                            class="guide-programme">Gogglebox</span></a></div>
                <div class="subtitle" style="width: 225px;"><font color="#5c5c5c">21:00 - 22:00</font></div>
                <div class="tip hide" style="display: none;">Gogglebox<br><font color="#5c5c5c">21:00 -
                        22:00</font><br>Posh tipplers Steph and Dom, hairdressers Christopher and Stephen and
                    other favourites share their opinions on what they have been watching during the week,
                    including the Paralympic Winter Games, Call the Midwife, Secret Eaters, Dancing on Ice and
                    The Taste. The programme captures their instant reactions and lively - sometimes emotional -
                    discussions from the comfort of their own sofas. Narrated by Caroline Aherne.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">4</div>
                <div class="start hide">1394830800</div>
                <div class="end hide">1394834400</div>
            </div>
        </div>
        <div class="programme" style="width: 1px;">
            <div class="line" style="width: 1px;">
                <div class="title" style="width: -15px;"><a class="guide-programme"
                                                            href="/programme/321033"><span
                            class="guide-programme">The Last Leg</span></a></div>
                <div class="subtitle" style="width: -15px;"><font color="#5c5c5c">22:00 - 22:50</font></div>
                <div class="tip hide" style="display: none;">The Last Leg<br><font color="#5c5c5c">22:00 -
                        22:50</font><br>Adam Hills, Josh Widdicombe and Alex Brooker are joined by guest
                    Jennifer Saunders for a comic review of the significant moments of the past seven days,
                    including stories and highlights from the Sochi 2014 Winter Paralympics. They also follow
                    Alex's quest to participate in the Rio Paralympics in 2016.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">4</div>
                <div class="start hide">1394834400</div>
                <div class="end hide">1394837400</div>
            </div>
        </div>
    </div>
</div>
<div id="channel-5" class="row">
    <div class="logo col-md-2"><a href="/watch.html?c=5" title="Channel 5"><img
                src="http://static.cdn.tvcatchup.com/20140123/images/channels/home-channels/enabled/hp_channel_5.png"
                alt="Channel 5" style="width: 63px; height:50px;"></a></div>
    <div class="programmes col-md-10">
        <div class="programme"
             style="width: 240px; background: url('http://static.cdn.tvcatchup.com/20140123/images/themes/grey/guide_row_now.png') no-repeat -0px 0px;">
            <div class="line" style="width: 240px;">
                <div class="title" style="width: 225px;"><a style="color: #ffffff;" href="/programme/317420">The
                        Gadget Show</a></div>
                <div class="subtitle" style="width: 225px;"><a class="watchNow-guide" href="/watch.html?c=5"
                                                               style="color: #9CEF4A ;">Watch Now</a></div>
                <div class="tip hide" style="display: none;">The Gadget Show<br><font color="#5c5c5c">19:00 -
                        20:00</font><br>The team goes in search of the ultimate home cinema set-up, with Jon
                    Bentley checking out the best big-screen TVs alongside Capital FM DJ Dominic Byrne, and
                    Jason Bradbury taking care of the audio equipment systems. Rachel Riley and Jason create
                    trousers that can roll themselves up into shorts and a pair of high heels that transform
                    into flats at the touch of a button, and rapper Jamal Edwards tries out the latest
                    smartphone camera apps. Ortis Deley tests a bike-rollerblade hybrid and a device that
                    automatically aims cameras.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">5</div>
                <div class="start hide">1394823600</div>
                <div class="end hide">1394827200</div>
            </div>
        </div>
        <div class="programme" style="width: 240px;">
            <div class="line" style="width: 240px;">
                <div class="title" style="width: 225px;"><a class="guide-programme"
                                                            href="/programme/321057"><span
                            class="guide-programme">Ice Road Truckers</span></a></div>
                <div class="subtitle" style="width: 225px;"><font color="#5c5c5c">20:00 - 21:00</font></div>
                <div class="tip hide" style="display: none;">Ice Road Truckers<br><font color="#5c5c5c">20:00 -
                        21:00</font><br>Rick Yemm calls in specialists to clean out his truck and they discover
                    an infestation of deer mice, which are known to carry the potentially fatal hantavirus.
                    Following Jack Jessee's decision to walk away, terminal manager Lane Keator leaves his desk
                    in Fairbanks, Alaska, to get behind the wheel again, while Alex Debogorski takes a huge
                    excavator to Aklavik in the Northwest Territories, crossing the frozen waters of the
                    Mackenzie river delta along the way.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">5</div>
                <div class="start hide">1394827200</div>
                <div class="end hide">1394830800</div>
            </div>
        </div>
        <div class="programme" style="width: 240px;">
            <div class="line" style="width: 240px;">
                <div class="title" style="width: 225px;"><a class="guide-programme"
                                                            href="/programme/332774"><span
                            class="guide-programme">The Plane That Vanished: Live</span></a></div>
                <div class="subtitle" style="width: 225px;"><font color="#5c5c5c">21:00 - 22:00</font></div>
                <div class="tip hide" style="display: none;">The Plane That Vanished: Live<br><font
                        color="#5c5c5c">21:00 - 22:00</font><br>Last Saturday, Malaysia Airlines Flight 370 took
                    off for Beijing from Kuala Lumpur with 239 passengers and crew on board and just over an
                    hour later it altered course and vanished from the radar screens. In this programme, Donal
                    MacIntyre is joined by aviation experts to investigate all the major theories surrounding
                    the disappearance of the civilian airliner, asking if it was pilot error, technical failure,
                    terrorism or some other freak occurrence.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">5</div>
                <div class="start hide">1394830800</div>
                <div class="end hide">1394834400</div>
            </div>
        </div>
        <div class="programme" style="width: 1px;">
            <div class="line" style="width: 1px;">
                <div class="title" style="width: -15px;"><a class="guide-programme"
                                                            href="/programme/321059"><span
                            class="guide-programme">NCIS: Los Angeles</span></a></div>
                <div class="subtitle" style="width: -15px;"><font color="#5c5c5c">22:00 - 23:00</font></div>
                <div class="tip hide" style="display: none;">NCIS: Los Angeles<br><font color="#5c5c5c">22:00 -
                        23:00</font><br>On a live-fire air force training exercise, someone hacks into the
                    control systems of a drone and fires one of its two live missiles, striking and killing a
                    serviceman, before piloting it away. Sam and Callen meet with a member of the National
                    Security Agency, while Eric's inquiries lead him to a group of students on an advanced
                    computer science course and Kensi is sent under cover to pose as its guest
                    speaker.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">5</div>
                <div class="start hide">1394834400</div>
                <div class="end hide">1394838000</div>
            </div>
        </div>
    </div>
</div>
<div id="channel-144" class="row">
    <div class="logo col-md-2"><a href="/watch.html?c=144" title="S4C"><img
                src="http://static.cdn.tvcatchup.com/20140123/images/channels/home-channels/enabled/hp_channel_144.png"
                alt="S4C" style="width: 63px; height:50px;"></a></div>
    <div class="programmes col-md-10">
        <div class="programme"
             style="width: 480px; background: url('http://static.cdn.tvcatchup.com/20140123/images/themes/grey/guide_row_now.png') no-repeat -0px 0px;">
            <div class="title" style="width: 465px;"><a style="color: #ffffff;" href="/programme/321919">Y Clwb
                    Rygbi</a></div>
            <div class="subtitle" style="width: 465px;"><a class="watchNow-guide" href="/watch.html?c=144"
                                                           style="color: #9CEF4A ;">Watch Now</a></div>
            <div class="tip hide" style="display: none;">Y Clwb Rygbi<br><font color="#5c5c5c">18:50 -
                    21:00</font><br>Wales Under-20s v Scotland Under-20s (Kick-off 7.00pm). Gareth Roberts
                presents coverage of both teams' fifth and final Six Nations encounter, held at Parc Eirias in
                Colwyn Bay.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span></div>
            <div class="channel hide">144</div>
            <div class="start hide">1394823000</div>
            <div class="end hide">1394830800</div>
        </div>
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/321920"><span
                            class="guide-programme">Newyddion 9 a'r Tywydd</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">21:00 - 21:30</font></div>
                <div class="tip hide" style="display: none;">Newyddion 9 a'r Tywydd<br><font color="#5c5c5c">21:00
                        - 21:30</font><br><span style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">144</div>
                <div class="start hide">1394830800</div>
                <div class="end hide">1394832600</div>
            </div>
        </div>
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/321921"><span
                            class="guide-programme">Sam ar y Sgrin</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">21:30 - 22:00</font></div>
                <div class="tip hide" style="display: none;">Sam ar y Sgrin<br><font color="#5c5c5c">21:30 -
                        22:00</font><br>Aled Samuel looks back at the week's TV highlights and previews
                    forthcoming programmes col-md-10.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">144</div>
                <div class="start hide">1394832600</div>
                <div class="end hide">1394834400</div>
            </div>
        </div>
        <div class="programme" style="width: 1px;">
            <div class="line" style="width: 1px;">
                <div class="title" style="width: -15px;"><a class="guide-programme"
                                                            href="/programme/321922"><span
                            class="guide-programme">Jonathan</span></a></div>
                <div class="subtitle" style="width: -15px;"><font color="#5c5c5c">22:00 - 23:00</font></div>
                <div class="tip hide" style="display: none;">Jonathan<br><font color="#5c5c5c">22:00 -
                        23:00</font><br>The host is joined by Nigel Owens, Sarra Elgan and guests to preview
                    Wales's vital last match in the 2014 Six Nations Championship against Scotland. Last in the
                    series.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">144</div>
                <div class="start hide">1394834400</div>
                <div class="end hide">1394838000</div>
            </div>
        </div>
    </div>
</div>
<div id="channel-12" class="row">
    <div class="logo col-md-2"><a href="/watch.html?c=12" title="BBC Three"><img
                src="http://static.cdn.tvcatchup.com/20140123/images/channels/home-channels/enabled/hp_channel_12.png"
                alt="BBC Three" style="width: 63px; height:50px;"></a></div>
    <div class="programmes col-md-10">
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/321145"><span
                            class="guide-programme">Great Movie Mistakes IV: May the Fourth Be with You</span></a>
                </div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">19:00 - 19:30</font></div>
                <div class="tip hide" style="display: none;">Great Movie Mistakes IV: May the Fourth Be with
                    You<br><font
                        color="#5c5c5c">19:00 - 19:30</font><br>Robert Webb reveals a handful of blunders and
                    gaffes that have appeared in Hollywood films over the years, from cameramen caught in shot
                    to shoddy props and wobbly scenery.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">12</div>
                <div class="start hide">1394823600</div>
                <div class="end hide">1394825400</div>
            </div>
        </div>
        <div class="programme"
             style="width: 180px; background: url('http://static.cdn.tvcatchup.com/20140123/images/themes/grey/guide_row_now.png') no-repeat -120px 0px;">
            <div class="line" style="width: 180px;">
                <div class="title" style="width: 165px;"><a style="color: #ffffff;" href="/programme/321146">Doctor
                        Who</a></div>
                <div class="subtitle" style="width: 165px;"><a class="watchNow-guide" href="/watch.html?c=12"
                                                               style="color: #9CEF4A ;">Watch Now</a></div>
                <div class="tip hide" style="display: none;">Doctor Who<br><font color="#5c5c5c">19:30 -
                        20:15</font><br>Five years in the future, Amy has put her adventures with the Doctor
                    behind her and is about to become a mother. The Time Lord returns and leaves her facing a
                    heart-breaking choice that will change her life for ever. Toby Jones (Truman Capote in
                    Infamous) guest stars alongside Karen Gillan and Matt Smith, in an episode written by Men
                    Behaving Badly creator Simon Nye.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">12</div>
                <div class="start hide">1394825400</div>
                <div class="end hide">1394828100</div>
            </div>
        </div>
        <div class="programme" style="width: 180px;">
            <div class="line" style="width: 180px;">
                <div class="title" style="width: 165px;"><a class="guide-programme"
                                                            href="/programme/321147"><span
                            class="guide-programme">Doctor Who</span></a></div>
                <div class="subtitle" style="width: 165px;"><font color="#5c5c5c">20:15 - 21:00</font></div>
                <div class="tip hide" style="display: none;">Doctor Who<br><font color="#5c5c5c">20:15 -
                        21:00</font><br>Part one of two. When an ambitious project to drill into the Earth
                    wakens an ancient enemy, the Doctor leaps into action. As Amy learns she cannot trust even
                    the ground under her feet, it becomes clear that while humans were digging down, another
                    species was on its way up. Meera Syal, Neve McIntosh and Robert Pugh guest star alongside
                    Matt Smith and Karen Gillan.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">12</div>
                <div class="start hide">1394828100</div>
                <div class="end hide">1394830800</div>
            </div>
        </div>
        <div class="programme" style="width: 241px;">
            <div class="line" style="width: 241px;">
                <div class="title" style="width: 225px;"><a class="guide-programme"
                                                            href="/programme/318450"><span
                            class="guide-programme">Blades of Glory</span></a></div>
                <div class="subtitle" style="width: 225px;"><font color="#5c5c5c">21:00 - 22:30</font></div>
                <div class="tip hide" style="display: none;">Blades of Glory<br><font color="#5c5c5c">21:00 -
                        22:30</font><br>A bad boy figure skater and his effeminate arch-enemy are banned from
                    the sport after their intense rivalry results in a brawl. However, the pair find a loophole
                    in the regulations allowing them to enter the world championships as the first ever same-sex
                    pair - if they can put aside their differences long enough to compete. Comedy, starring Will
                    Ferrell, Jon Heder, Will Arnett and Amy Poehler.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">12</div>
                <div class="start hide">1394830800</div>
                <div class="end hide">1394836200</div>
            </div>
        </div>
    </div>
</div>
<div id="channel-13" class="row">
    <div class="logo col-md-2"><a href="/watch.html?c=13" title="BBC Four"><img
                src="http://static.cdn.tvcatchup.com/20140123/images/channels/home-channels/enabled/hp_channel_13.png"
                alt="BBC Four" style="width: 63px; height:50px;"></a></div>
    <div class="programmes col-md-10">
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/321151"><span
                            class="guide-programme">World News Today</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">19:00 - 19:30</font></div>
                <div class="tip hide" style="display: none;">World News Today<br><font color="#5c5c5c">19:00 -
                        19:30</font><br>The day's leading stories.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">13</div>
                <div class="start hide">1394823600</div>
                <div class="end hide">1394825400</div>
            </div>
        </div>
        <div class="programme"
             style="width: 120px; background: url('http://static.cdn.tvcatchup.com/20140123/images/themes/grey/guide_row_now.png') no-repeat -120px 0px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a style="color: #ffffff;" href="/programme/321152">Transatlantic
                        Sessions</a></div>
                <div class="subtitle" style="width: 105px;"><a class="watchNow-guide" href="/watch.html?c=13"
                                                               style="color: #9CEF4A ;">Watch Now</a></div>
                <div class="tip hide" style="display: none;">Transatlantic Sessions<br><font color="#5c5c5c">19:30
                        - 20:00</font><br>Hosts Aly Bain, Jerry Douglas and their resident house band are joined
                    at the show's studios overlooking Loch Lomond by Edinburgh accordionist Phil Cunningham and
                    Irish flute and tin whistle player Mike McGoldrick.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">13</div>
                <div class="start hide">1394825400</div>
                <div class="end hide">1394827200</div>
            </div>
        </div>
        <div class="programme" style="width: 240px;">
            <div class="line" style="width: 240px;">
                <div class="title" style="width: 225px;"><a class="guide-programme"
                                                            href="/programme/321153"><span
                            class="guide-programme">In Their Own Words: 20th Century Composers</span></a></div>
                <div class="subtitle" style="width: 225px;"><font color="#5c5c5c">20:00 - 21:00</font></div>
                <div class="tip hide" style="display: none;">In Their Own Words: 20th Century Composers<br><font
                        color="#5c5c5c">20:00 - 21:00</font><br>A selection of classical music from the BBC
                    archives, featuring rare footage of leading composers from the 1900s, in and out of the
                    performance arena. Schoenberg takes to the tennis court, Strauss and Shostakovich entertain
                    their grandchildren, and Messiaen tells the story of how he wrote his most significant work
                    in a German POW camp, painting a vivid picture of what it took to be a composer in the most
                    turbulent time in modern history. There is also a glimpse into the worlds of Stravinsky,
                    Aaron Copland, William Walton, Elisabeth Lutyens and Michael Tippett. Narrated by Rebecca
                    Front.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">13</div>
                <div class="start hide">1394827200</div>
                <div class="end hide">1394830800</div>
            </div>
        </div>
        <div class="programme" style="width: 241px;">
            <div class="line" style="width: 241px;">
                <div class="title" style="width: 225px;"><a class="guide-programme"
                                                            href="/programme/321154"><span
                            class="guide-programme">The Byrd Who Flew Alone</span></a></div>
                <div class="subtitle" style="width: 225px;"><font color="#5c5c5c">21:00 - 22:30</font></div>
                <div class="tip hide" style="display: none;">The Byrd Who Flew Alone<br><font color="#5c5c5c">21:00
                        - 22:30</font><br>A documentary on the enigmatic former Byrds frontman Gene Clark,
                    drawing on interviews with his family, friends and fellow musicians. Since the Missouri-born
                    songwriter's death in 1991 at the age of 46, his songs have been covered by artists ranging
                    from Robert Plant to Yo La Tengo, and he has been hailed as a key influence by generations
                    of musicians - and yet arguably failed to enjoy the success his work deserved.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">13</div>
                <div class="start hide">1394830800</div>
                <div class="end hide">1394836200</div>
            </div>
        </div>
    </div>
</div>
<div id="channel-32" class="row">
    <div class="logo col-md-2"><a href="/watch.html?c=32" title="BBC Alba"><img
                src="http://static.cdn.tvcatchup.com/20140123/images/channels/home-channels/enabled/hp_channel_32.png"
                alt="BBC Alba" style="width: 63px; height:50px;"></a></div>
    <div class="programmes col-md-10">
        <div class="programme" style="width: 20px;">
            <div class="title" style="width: 5px;"><a class="guide-programme" href="/programme/321559"><span
                        class="guide-programme">Leabhar na Dluth-Choille</span></a></div>
            <div class="subtitle" style="width: 5px;"><font color="#5c5c5c">18:55 - 19:05</font></div>
            <div class="tip hide" style="display: none;">Leabhar na Dluth-Choille<br><font color="#5c5c5c">18:55
                    - 19:05</font><br>(Jungle Book) Shere Khan faces a life-threatening situation and Mowgli is
                the only one who can save him.&nbsp;<span
                    style="color: #9CEF4A;">Click title for more info.</span></div>
            <div class="channel hide">32</div>
            <div class="start hide">1394823300</div>
            <div class="end hide">1394823900</div>
        </div>
        <div class="programme" style="width: 100px;">
            <div class="line" style="width: 100px;">
                <div class="title" style="width: 85px;"><a class="guide-programme"
                                                           href="/programme/321560"><span
                            class="guide-programme">Machair</span></a></div>
                <div class="subtitle" style="width: 85px;"><font color="#5c5c5c">19:05 - 19:30</font></div>
                <div class="tip hide" style="display: none;">Machair<br><font color="#5c5c5c">19:05 -
                        19:30</font><br>Gaelic soap based on the Isle of Lewis.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">32</div>
                <div class="start hide">1394823900</div>
                <div class="end hide">1394825400</div>
            </div>
        </div>
        <div class="programme"
             style="width: 120px; background: url('http://static.cdn.tvcatchup.com/20140123/images/themes/grey/guide_row_now.png') no-repeat -120px 0px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a style="color: #ffffff;" href="/programme/319916">Eòrpa</a>
                </div>
                <div class="subtitle" style="width: 105px;"><a class="watchNow-guide" href="/watch.html?c=32"
                                                               style="color: #9CEF4A ;">Watch Now</a></div>
                <div class="tip hide" style="display: none;">Eòrpa<br><font color="#5c5c5c">19:30 - 20:00</font><br>(European
                    Current Affairs) A report from Serbia, where incidents of domestic abuse for both men and
                    women are on the rise. Plus, the plight of Syrian refugees in Sweden.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">32</div>
                <div class="start hide">1394825400</div>
                <div class="end hide">1394827200</div>
            </div>
        </div>
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/321561"><span
                            class="guide-programme">An Là</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">20:00 - 20:30</font></div>
                <div class="tip hide" style="display: none;">An Là<br><font color="#5c5c5c">20:00 - 20:30</font><br>(News)
                    Local, national and international news reports.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">32</div>
                <div class="start hide">1394827200</div>
                <div class="end hide">1394829000</div>
            </div>
        </div>
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/321562"><span
                            class="guide-programme">A 'Fuine le</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">20:30 - 21:00</font></div>
                <div class="tip hide" style="display: none;">A 'Fuine le<br><font color="#5c5c5c">20:30 -
                        21:00</font><br>(Baking With) Mairi MacRitchie travels the Gàidhealtachd meeting some of
                    the country's best bakers, who share with her their favourite recipes. In this instalment
                    she picks up tips on how to use eggs in baking.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">32</div>
                <div class="start hide">1394829000</div>
                <div class="end hide">1394830800</div>
            </div>
        </div>
        <div class="programme" style="width: 240px;">
            <div class="line" style="width: 240px;">
                <div class="title" style="width: 225px;"><a class="guide-programme"
                                                            href="/programme/321563"><span
                            class="guide-programme">Nationwide an Alba</span></a></div>
                <div class="subtitle" style="width: 225px;"><font color="#5c5c5c">21:00 - 22:00</font></div>
                <div class="tip hide" style="display: none;">Nationwide an Alba<br><font color="#5c5c5c">21:00 -
                        22:00</font><br>Alasdair Fraser takes a look back at some of the interesting and unusual
                    stories from the east of Scotland covered by the BBC TV series Nationwide between 1969 and
                    1983. They include a Glasgow-based crane driver who resigned to start a new life as a
                    shepherd in the Scottish Borders.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">32</div>
                <div class="start hide">1394830800</div>
                <div class="end hide">1394834400</div>
            </div>
        </div>
        <div class="programme" style="width: 1px;">
            <div class="line" style="width: 1px;">
                <div class="title" style="width: -15px;"><a class="guide-programme"
                                                            href="/programme/318669"><span
                            class="guide-programme">Craic</span></a></div>
                <div class="subtitle" style="width: -15px;"><font color="#5c5c5c">22:00 - 22:30</font></div>
                <div class="tip hide" style="display: none;">Craic<br><font color="#5c5c5c">22:00 - 22:30</font><br>The
                    members of the panel discuss proposals, weddings and equal marriage.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">32</div>
                <div class="start hide">1394834400</div>
                <div class="end hide">1394836200</div>
            </div>
        </div>
    </div>
</div>
<div id="channel-6" class="row">
    <div class="logo col-md-2"><a target="_blank" href="/redirect/6" title="ITV2"><img
                src="http://static.cdn.tvcatchup.com/20140123/images/channels/home-channels/enabled/hp_channel_6.png"
                alt="ITV2" style="width: 63px; height:50px;"></a></div>
    <div class="programmes col-md-10">
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/321070"><span
                            class="guide-programme">You've Been Framed!</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">19:00 - 19:30</font></div>
                <div class="tip hide" style="display: none;">You've Been Framed!<br><font color="#5c5c5c">19:00
                        - 19:30</font><br>Comedian Harry Hill narrates a selection of camcorder calamities and
                    viewers' mobile phone footage, with clips on the themes of sleep, summer and
                    scary.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">6</div>
                <div class="start hide">1394823600</div>
                <div class="end hide">1394825400</div>
            </div>
        </div>
        <div class="programme"
             style="width: 120px; background: url('http://static.cdn.tvcatchup.com/20140123/images/themes/grey/guide_row_now.png') no-repeat -120px 0px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a style="color: #ffffff;" href="/programme/321071">You've
                        Been Framed!</a></div>
                <div class="subtitle" style="width: 105px;"><a class="externalLink-guide" target="_blank"
                                                               href="/redirect/6" style="color: #9CEF4A;">Watch
                        On <span style="color:#eb3a1d">ITV2</span></a></div>
                <div class="tip hide" style="display: none;">You've Been Framed!<br><font color="#5c5c5c">19:30
                        - 20:00</font><br>Harry Hill narrates a comical selection of mishaps filmed by viewers,
                    featuring everything from giddy grandmas, cute kids and crazy animals to below-the-belt
                    mishaps, practical jokers and painful-looking accidents.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">6</div>
                <div class="start hide">1394825400</div>
                <div class="end hide">1394827200</div>
            </div>
        </div>
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/330431"><span
                            class="guide-programme">Two and a Half Men</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">20:00 - 20:30</font></div>
                <div class="tip hide" style="display: none;">Two and a Half Men<br><font color="#5c5c5c">20:00 -
                        20:30</font><br>Charlie is forced to rethink his playboy attitude when an old friend
                    dies during a visit. Guest starring James Earl Jones, Emilio Estevez and Melanie Lynskey.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">6</div>
                <div class="start hide">1394827200</div>
                <div class="end hide">1394829000</div>
            </div>
        </div>
        <div class="programme" style="width: 120px;">
            <div class="line" style="width: 120px;">
                <div class="title" style="width: 105px;"><a class="guide-programme"
                                                            href="/programme/330432"><span
                            class="guide-programme">Two and a Half Men</span></a></div>
                <div class="subtitle" style="width: 105px;"><font color="#5c5c5c">20:30 - 21:00</font></div>
                <div class="tip hide" style="display: none;">Two and a Half Men<br><font color="#5c5c5c">20:30 -
                        21:00</font><br>Charlie believes he knows the reason for Jake's bad mood, while Alan
                    continues to think he is responsible for Judith's pregnancy. Charlie Sheen and Jon Cryer
                    star.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">6</div>
                <div class="start hide">1394829000</div>
                <div class="end hide">1394830800</div>
            </div>
        </div>
        <div class="programme" style="width: 241px;">
            <div class="line" style="width: 241px;">
                <div class="title" style="width: 225px;"><a class="guide-programme"
                                                            href="/programme/318355"><span
                            class="guide-programme">White Chicks</span></a></div>
                <div class="subtitle" style="width: 225px;"><font color="#5c5c5c">21:00 - 23:20</font></div>
                <div class="tip hide" style="display: none;">White Chicks<br><font color="#5c5c5c">21:00 -
                        23:20</font><br>Two black male FBI agents pose as white female debutantes in the line of
                    duty, donning full drag and very heavy make-up in an audacious bid to infiltrate a
                    kidnapping ring. Comedy, starring brothers Shawn and Marlon Wayans, with Jaime King and
                    Frankie Faison. Including FYI Daily.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">6</div>
                <div class="start hide">1394830800</div>
                <div class="end hide">1394839200</div>
            </div>
        </div>
    </div>
</div>
<div id="channel-9" class="row">
    <div class="logo col-md-2"><a target="_blank" href="/redirect/9" title="ITV3"><img
                src="http://static.cdn.tvcatchup.com/20140123/images/channels/home-channels/enabled/hp_channel_9.png"
                alt="ITV3" style="width: 63px; height:50px;"></a></div>
    <div class="programmes col-md-10">
        <div class="programme"
             style="width: 220px; background: url('http://static.cdn.tvcatchup.com/20140123/images/themes/grey/guide_row_now.png') no-repeat -0px 0px;">
            <div class="title" style="width: 205px;"><a style="color: #ffffff;" href="/programme/321109">Murder,
                    She Wrote</a></div>
            <div class="subtitle" style="width: 205px;"><a class="externalLink-guide" target="_blank"
                                                           href="/redirect/9" style="color: #9CEF4A;">Watch On
                    <span style="color:#eb3a1d">ITV3</span></a></div>
            <div class="tip hide" style="display: none;">Murder, She Wrote<br><font color="#5c5c5c">18:55 -
                    19:55</font><br>The spirit of old Salem comes to Cabot Cove as Jessica investigates strange
                happenings involving a woman who has been dead for three centuries. Guest starring Roddy
                McDowall and Dee Wallace Stone, with Angela Lansbury.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
            </div>
            <div class="channel hide">9</div>
            <div class="start hide">1394823300</div>
            <div class="end hide">1394826900</div>
        </div>
        <div class="programme" style="width: 260px;">
            <div class="line" style="width: 260px;">
                <div class="title" style="width: 245px;"><a class="guide-programme"
                                                            href="/programme/257497"><span
                            class="guide-programme">Agatha Christie's Poirot</span></a></div>
                <div class="subtitle" style="width: 245px;"><font color="#5c5c5c">19:55 - 21:00</font></div>
                <div class="tip hide" style="display: none;">Agatha Christie's Poirot<br><font color="#5c5c5c">19:55
                        - 21:00</font><br>A Belgian film star arrives in London and summons her friend Poirot to
                    unravel the mysterious threats she has been receiving, which demand the return of a
                    priceless diamond, the Western Star. Rosalind Bennett guest stars.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">9</div>
                <div class="start hide">1394826900</div>
                <div class="end hide">1394830800</div>
            </div>
        </div>
        <div class="programme" style="width: 240px;">
            <div class="line" style="width: 240px;">
                <div class="title" style="width: 225px;"><a class="guide-programme"
                                                            href="/programme/321110"><span
                            class="guide-programme">David Suchet on the Orient Express</span></a></div>
                <div class="subtitle" style="width: 225px;"><font color="#5c5c5c">21:00 - 22:00</font></div>
                <div class="tip hide" style="display: none;">David Suchet on the Orient Express<br><font
                        color="#5c5c5c">21:00 - 22:00</font><br>The Poirot star rides the famous train through
                    Europe, discovering some of the real-life dramas the Orient Express has witnessed over the
                    years, including the time Hitler made the French surrender in one of its carriages. Mingling
                    with fellow passengers and staff, he looks back on the train's rich history from its
                    inaugural trip in 1883 - and realises a childhood dream when he is allowed to drive it.&nbsp;<span
                        style="color: #9CEF4A;">Click title for more info.</span></div>
                <div class="channel hide">9</div>
                <div class="start hide">1394830800</div>
                <div class="end hide">1394834400</div>
            </div>
        </div>
        <div class="programme" style="width: 1px;">
            <div class="line" style="width: 1px;">
                <div class="title" style="width: -15px;"><a class="guide-programme"
                                                            href="/programme/321111"><span
                            class="guide-programme">Scott &amp; Bailey</span></a></div>
                <div class="subtitle" style="width: -15px;"><font color="#5c5c5c">22:00 - 23:00</font></div>
                <div class="tip hide" style="display: none;">Scott &amp; Bailey<br><font color="#5c5c5c">22:00 -
                        23:00</font><br>The duo look into the murder of an eight-year-old boy, coming up against
                    a paedophile who cruelly deceives his victim's family. Dom's HIV test comes back negative,
                    so he sets out to celebrate - only to endanger his own life and jeopardise Rachel's
                    sergeant's exam in the process. Janet tells Andy she is having second thoughts about their
                    brief liaison, but he finds her decision hard to accept. Suranne Jones and Lesley Sharp
                    star, with Liam Boyle, Nicholas Gleaves and Joe Duttine.&nbsp;<span style="color: #9CEF4A;">Click title for more info.</span>
                </div>
                <div class="channel hide">9</div>
                <div class="start hide">1394834400</div>
                <div class="end hide">1394838000</div>
            </div>
        </div>
    </div>
</div>
</div>
<div id="current">
    <div id="top"></div>
    <div id="bottom"></div>
</div>
<div></div>
<div style="margin-bottom:20px;"></div>
</div>
<!--  
	The delete button uses Resftulizer.js to restfully submit with "Delete".  The "action_confirm" class triggers an optional confirm dialog.
	Also, I have hardcoded adding the "disabled" class to the Admin group - deleting your own admin access causes problems.
-->
@stop

