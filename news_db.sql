-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 أغسطس 2025 الساعة 14:12
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_db`
--

-- --------------------------------------------------------

--
-- بنية الجدول `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `published_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `articles`
--

INSERT INTO `articles` (`article_id`, `title`, `content`, `image_url`, `category_id`, `author_id`, `published_date`) VALUES
(1, 'Sinner banishes Roland Garros demons to de-throne Alcaraz at Wimbledon', 'Wimbledon, July 13, 2025 — In a performance marked by precision, power, and redemption, Italy’s Jannik Sinner triumphed over defending champion Carlos Alcaraz in an electrifying Wimbledon final, claiming his first Grand Slam title and exorcising the ghosts of his heartbreaking Roland Garros exit just a month earlier.\r\n\r\nThe match, played on Centre Court in front of a roaring crowd, showcased the evolution of Sinner’s game. The 23-year-old displayed remarkable composure and control, defeating Alcaraz in four thrilling sets: 6-4, 3-6, 7-5, 6-3.\r\n\r\n\"I knew I had to raise my level — not just physically, but mentally too,\" Sinner said after lifting the trophy. \"After what happened in Paris, I promised myself I would come back stronger. This means everything.\"\r\n\r\nLast month, Sinner suffered a shocking semi-final loss at Roland Garros after leading by two sets. Many doubted whether he could mentally recover in time for Wimbledon. But instead of faltering, he used the pain as fuel — and delivered his most complete performance yet.\r\n\r\nCarlos Alcaraz, the Spanish prodigy and world No. 2, fought valiantly but struggled to match Sinner\'s relentless baseline pressure and surprisingly effective net play. “Jannik was just too good today,” Alcaraz admitted. “He deserved this win.”\r\n\r\nThe win marks a historic moment for Italian tennis, with Sinner becoming the first Italian man to win Wimbledon in the Open Era. His victory also sends a strong message to the tennis world: a new Grand Slam contender has truly arrived.\r\n\r\nAs the crowd rose in applause and the Italian anthem played, Sinner knelt on the grass — not in disbelief, but in quiet triumph.\r\n\r\n', 'images/BR1.avif', 1, 1, '2025-08-02 07:43:18'),
(2, 'Palmer Double Fires Chelsea Past PSG to Club World Cup Glory', 'Jeddah, Saudi Arabia – July 13, 2025 — Cole Palmer etched his name into Chelsea\'s history books with a sensational performance, scoring twice to lead the Blues to a 3-1 victory over Paris Saint-Germain in the FIFA Club World Cup final.\r\n\r\nThe highly anticipated clash between the European and French giants delivered drama, intensity, and moments of brilliance. But it was Palmer, the 23-year-old English midfielder, who stole the spotlight, showing composure beyond his years on the world stage.\r\n\r\nPalmer opened the scoring in the 22nd minute with a clinical finish after a slick one-two with Enzo Fernández. Despite a brief PSG resurgence that saw Kylian Mbappé equalize before halftime, Chelsea regained control in the second half.\r\n\r\nIn the 68th minute, Palmer struck again — this time curling a stunning shot from the edge of the box that left the PSG goalkeeper rooted. Chelsea sealed the win with a late goal from Nicolas Jackson, who capitalized on a defensive error to put the game beyond reach.\r\n\r\n“This is a dream come true,” Palmer said post-match. “To score twice in a final like this is something every player dreams about. I’m proud of the team and everything we’ve achieved.”\r\n\r\nFor Chelsea, this victory marks their first-ever Club World Cup title, adding a prestigious international trophy to their growing cabinet. Manager Mauricio Pochettino praised his squad’s mentality and adaptability: “We showed great character today. The players gave everything — this win belongs to the entire club.”\r\n\r\nPSG, meanwhile, will return home disappointed, as their search for Club World Cup glory continues.\r\n\r\nAs Chelsea celebrated under the fireworks at King Abdullah Sports City Stadium, it was clear — a new star had risen, and his name is Cole Palmer.', 'images/BR2.avif', 1, 1, '2025-08-02 07:44:55'),
(3, 'Chris Gotterup earns second career win with victory at Scottish Open', 'North Berwick, Scotland – July 13, 2025 — American golfer Chris Gotterup claimed his second career PGA Tour title in stunning fashion, capturing the 2025 Genesis Scottish Open after a dramatic final round at The Renaissance Club.\r\n\r\nThe 25-year-old delivered a composed and consistent performance throughout the tournament, but it was his nerves of steel on the final day that truly set him apart. Gotterup shot a flawless 5-under 65 in challenging windy conditions to finish at -17, edging out a competitive field that included several of the world’s top-ranked players.\r\n\r\n“I’ve worked really hard for this moment,” Gotterup said in his post-round interview. “This win means even more than the first — proving to myself that I belong at this level, especially in a field like this.”\r\n\r\nGotterup’s win was highlighted by key birdies on holes 14, 16, and 18, the last of which brought the crowd to its feet as he calmly sank a 20-foot putt to secure the title. His strong driving and accurate approach shots were crucial throughout the week.\r\n\r\nChallengers like Rory McIlroy and Viktor Hovland pushed late in the final round, but were unable to match Gotterup’s precision under pressure. McIlroy, the 2023 champion, finished two shots behind in second place.\r\n\r\nThe victory not only brings Gotterup a significant boost in the Official World Golf Ranking, but also earns him a spot in next week’s Open Championship at Royal Troon — a golden opportunity to continue his momentum on golf’s biggest stage.\r\n\r\nAs fans gathered around the 18th green in celebration, Gotterup lifted the trophy with a wide smile — a rising star, and now a two-time champion on the PGA Tour.', 'images/BR3.avif', 2, 1, '2025-08-02 07:45:44'),
(4, '3rd Test LIVE: 1st Time Since 1986 - KL Rahul, Pant Eye History For India', 'In a thrilling cricket encounter, India’s batting duo KL Rahul and Rishabh Pant are on the verge of making history during the ongoing 3rd Test match. For the first time since 1986, two Indian batsmen are eyeing a landmark achievement that could etch their names permanently in cricketing folklore.\r\n\r\nKL Rahul, known for his elegant stroke play and calm demeanor at the crease, has been in phenomenal form throughout the series. Alongside him, the dynamic wicketkeeper-batsman Rishabh Pant has dazzled fans with his aggressive approach and fearless batting style. Together, they are crafting a partnership that is not only pivotal for India’s prospects in the Test but also reminiscent of the great batting duos from the past.\r\n\r\nThe last time Indian players achieved such a feat dates back to 1986, a historic year marked by legendary performances that uplifted Indian cricket to new heights. This time around, Rahul and Pant are shouldering the responsibility with maturity and confidence, inspiring the entire team and the nation.\r\n\r\nAs the live action unfolds, cricket enthusiasts are glued to their screens, eagerly watching these two stars attempt to carve a memorable chapter in India’s cricket history. Their performance could serve as a beacon of hope and a testament to the evolving talent in Indian cricket.\r\n\r\nStay tuned for more updates as KL Rahul and Rishabh Pant continue their quest for glory in this gripping 3rd Test match.\r\n\r\n', 'images/LE1.webp', 3, 3, '2025-08-02 08:20:46'),
(5, 'Anything Close, Not Out: Kumble\'s Direct Attack At Umpire Paul Reiffel ', 'In a fiery exchange during a high-stakes cricket match, legendary Indian spinner Anil Kumble launched a direct verbal attack on umpire Paul Reiffel, criticizing his decision-making under pressure. The controversy arose when Reiffel’s calls on close LBW and caught-behind appeals appeared inconsistent, sparking frustration from Kumble and the Indian team.\r\n\r\nKumble, known for his composed demeanor, rarely shows such open displeasure on the field. However, the umpire’s refusal to give out “anything close” left the Indian players and fans baffled. “If it’s close, then it should be given out,” Kumble was heard telling Reiffel in a tense on-field discussion, highlighting the crucial role umpires play in upholding the spirit and fairness of the game.\r\n\r\nPaul Reiffel, a former Australian fast bowler turned umpire, maintained his composure amid the heated confrontation but faced criticism from many quarters for his decisions. The incident rekindled debates about the accuracy of on-field umpiring versus technology-assisted decisions like DRS.\r\n\r\nThis moment served as a reminder of the immense pressure umpires face and the impact their calls have on the outcome of a match. Fans and analysts alike continue to discuss Kumble’s outspoken criticism, which emphasized the fine margins that often define cricketing contests.\r\n\r\nAs the match progresses, eyes remain on the umpiring decisions, with hopes for fair play and a thrilling contest to the finish.', 'images/LE2.jpg', 3, 3, '2025-08-02 08:21:17'),
(6, 'Cricket Australia Announces Domestic Schedule For 2025-26 Season ', 'Cricket Australia has unveiled the comprehensive domestic schedule for the 2025–26 season, setting the stage for an action-packed summer of cricket. This season is particularly significant as it serves as a crucial lead-up to the highly anticipated Ashes series against England, scheduled to commence in November.\r\n\r\n🏏 Sheffield Shield\r\nThe Sheffield Shield, Australia\'s premier first-class competition, will feature four rounds of matches before the opening Ashes Test in Perth on November 21. These early fixtures are vital for players aiming to secure a spot in the national squad. Notably, one of these rounds will be played under day-night conditions, including a fixture at the Gabba, which is also set to host a pink-ball Ashes Test.\r\n\r\n🏆 Women\'s National Cricket League (WNCL)\r\nThe WNCL will kick off on September 24, with teams from Western Australia, Queensland, Victoria, and New South Wales competing across various venues. The league provides an important platform for emerging female cricketers to showcase their talent and compete for national selection.\r\n\r\n🥇 One Day Cup & T20 Spring Challenge\r\nThe One Day Cup and T20 Spring Challenge will continue to offer exciting limited-overs cricket, fostering competition among state teams and serving as a breeding ground for future stars.\r\n\r\n🌟 Australia A & Representative Fixtures\r\nAdditional fixtures, including matches for Australia A and other representative teams, will be announced soon. These games are designed to provide players with valuable opportunities to perform and push for higher honors.\r\n\r\n📅 Streaming and Accessibility\r\nTo enhance accessibility, every ball of the 2025–26 domestic season will be streamed live on cricket.com.au, the Cricket Australia Live app, and Kayo Sports.\r\n\r\n🏟️ Venues and Highlights\r\nMajor venues like the Melbourne Cricket Ground (MCG) and Adelaide Oval will host key fixtures, including the traditional Boxing Day and New Year\'s Tests. Meanwhile, the future of the Gabba as a Test venue remains uncertain due to potential redevelopment plans that could affect its hosting status.\r\n\r\nAs the season unfolds, players will have ample opportunities to impress selectors, with many Australian team regulars expected to represent their state teams as part of their preparation for the international calendar.\r\n\r\nFor more information, fans are encouraged to follow official Cricket Australia announcements.', 'images/LE6.webp', 1, 3, '2025-08-02 08:23:10'),
(7, 'What Was He Looking For?\': Rahul Slammed For Giving Akash Strike On Day 4', 'The cricketing world was abuzz after KL Rahul faced heavy criticism for handing over the strike to Akash on the crucial fourth day of the Test match. Fans and experts alike questioned Rahul’s decision-making in a tense moment, wondering if it was a tactical move or a misjudgment.\r\n\r\nDuring the high-pressure situation, Rahul’s choice to let Akash face the deliveries was met with skepticism, especially since Akash was relatively inexperienced compared to Rahul’s seasoned prowess. Critics argued that Rahul missed an opportunity to anchor the innings and guide the team through a challenging phase.\r\n\r\nSeveral analysts pointed out that the decision might have disrupted the team’s momentum, and some even speculated whether Rahul was attempting a risky strategy to unsettle the opposition. However, the move didn’t pay off as expected, leading to further scrutiny of Rahul’s captaincy and on-field decisions.\r\n\r\nDespite the backlash, supporters reminded fans that cricket is a game of uncertainties, and sometimes bold choices are necessary to turn the tide. As the match progressed, Rahul will have to prove that his decisions are driven by strategy and not momentary lapses.\r\n\r\nThe incident has sparked widespread debate on social media, with fans divided on whether Rahul’s move was a stroke of genius or a costly error.\r\n\r\n', 'images/LE7.avif', 1, 3, '2025-08-02 08:23:45'),
(8, 'Done For The Series\": Eng Star Dishes Out Sledging At Gill. This Happens Next', 'The ongoing Test series witnessed a fiery moment when an English cricket star unleashed sharp sledging aimed at India’s promising batsman, Shubman Gill. The verbal exchange quickly escalated tensions on the field, highlighting the intense rivalry between the two teams.\r\n\r\nDuring a critical phase of the match, the English player reportedly told Gill that he was “done for the series,” attempting to undermine the young batsman’s confidence. The sledging was met with mixed reactions — while some saw it as part of the game’s psychological battles, others questioned its sportsmanship.\r\n\r\nGill, known for his calm demeanor, responded to the provocation by focusing on his technique and performance, refusing to be rattled by the taunts. His composed reply on the pitch has been praised by commentators as a sign of maturity and resilience.\r\n\r\nFollowing the incident, the crowd erupted with excitement, and social media buzzed with debates over sledging culture in cricket — whether it is a legitimate tactic or crosses the line into disrespect.\r\n\r\nThe series continued with heightened intensity, as both teams sought to outplay each other not just with skill but also with mind games. This sledging episode added another memorable chapter to what promises to be a fiercely contested showdown.', 'images/LE8.jpg', 2, 3, '2025-08-02 08:24:28'),
(11, 'LIV Golf Andalucía: Talor Gooch wins individual title', 'Jayson Tatum is reportedly trying to recruit Damian Lillard to join the Boston Celtics...\r\n\r\nIn what could be one of the most seismic shifts in the NBA landscape, multiple league sources have confirmed that Boston Celtics star Jayson Tatum is actively recruiting Damian Lillard to make the move to Boston.\r\n\r\nTatum and Lillard were recently spotted training together during the offseason in Los Angeles, sparking a wave of speculation across social media. According to insiders close to both players, Tatum has been in constant contact with Lillard, emphasizing the Celtics’ strong championship potential and their need for an elite backcourt scorer.\r\n\r\nLillard, who has spent his entire career with the Portland Trail Blazers, has long been loyal to the franchise. However, with Portland missing the playoffs in recent years and entering what appears to be a rebuild, the All-Star guard may be more open than ever to a change of scenery.\r\n\r\nA potential move to Boston would instantly bolster the Celtics’ title hopes. Pairing Lillard’s elite scoring and clutch shooting with Tatum’s versatile offensive game and Jaylen Brown’s two-way prowess could form one of the most dangerous trios in the league.\r\n\r\n\"Dame respects what Boston has built,\" a league executive told The Athletic. \"He sees a young core, strong coaching, and a chance to compete for a title immediately. That matters to him.\"\r\n\r\nOf course, any trade for Lillard wouldn’t come cheap. The Trail Blazers would likely ask for a package including young players, future draft picks, and possibly a core piece like Derrick White or Malcolm Brogdon. The Celtics\' front office, led by Brad Stevens, has remained tight-lipped about any ongoing negotiations, but the whispers around the league are growing louder.\r\n\r\nLillard is under contract through 2027, which gives Portland leverage, but also raises the stakes for any interested contender. Still, Boston’s win-now mentality and history of bold front-office moves suggest they could be serious players if Lillard officially requests a trade.\r\n\r\nAs the offseason continues to unfold, all eyes will be on whether Tatum’s recruiting efforts will pay off — and if the Celtics are willing to push their chips to the center of the table in pursuit of Banner 18.\r\n\r\n', 'images/FE4.webp', 1, 1, '2025-07-29 08:14:50'),
(12, 'Euro 2025: England Thumps Wales 6-1 to Set Up Quarterfinal Clash', 'England crushed Wales 6-1 in an exciting match to set up a quarterfinal against Sweden...\r\n\r\nIn a dominant display of attacking football, England dismantled Wales 6-1 in their Round of 16 clash, booking a spot in the quarterfinals where they will face a strong Swedish side.\r\n\r\nFrom the opening whistle, England imposed their pace and tactical superiority, with captain Harry Kane opening the scoring in the 7th minute with a powerful header. Just moments later, Bukayo Saka doubled the lead with a stunning solo run, leaving the Welsh defense scrambling.\r\n\r\nWales, overwhelmed and disorganized, struggled to gain possession and create any significant chances in the first half. England’s relentless pressure continued, and Jude Bellingham added a third with a precise strike from the edge of the box just before halftime.\r\n\r\nDespite a brief moment of hope for Wales — a 55th-minute goal by Gareth Bale from a free kick — England quickly responded. Marcus Rashford, coming off the bench, netted a brace within 15 minutes, and Phil Foden sealed the deal with a clinical finish in the 88th minute.\r\n\r\n\"We were ruthless today,\" said England manager Gareth Southgate after the match. \"The boys stuck to the plan, and it paid off. We’re proud of the performance, but now it’s about recovery and preparing for Sweden.\"\r\n\r\nThe win not only marks one of England’s highest-scoring knockout games in recent history but also sends a clear message to the remaining contenders: this squad means business.\r\n\r\nWith momentum and confidence on their side, England will face Sweden in what promises to be a tactical and physical quarterfinal battle. Sweden, known for their disciplined defensive structure, will pose a different kind of challenge — but if England maintains this form, they may just be on course for a deep tournament run.\r\n\r\n', 'images/FE3.webp', 3, 1, '2025-07-29 08:15:15'),
(13, 'Euro 2025: France Reaches Quarterfinals, Ousts Netherlands', 'France shines in Euro 2025, defeating the Netherlands to advance to the quarterfinals...\r\n\r\nFrance delivered a commanding performance in Euro 2025, defeating the Netherlands 3-1 in a thrilling Round of 16 encounter to secure their place in the quarterfinals.\r\n\r\nFrom the outset, Les Bleus looked sharp and composed, controlling possession and pressing high up the pitch. Their efforts paid off early when Kylian Mbappé opened the scoring in the 12th minute with a sublime curling shot from outside the box, leaving Dutch goalkeeper Justin Bijlow with no chance.\r\n\r\nThe Netherlands responded with intensity, nearly equalizing through Cody Gakpo, whose effort rattled the crossbar in the 25th minute. However, France doubled their lead just before halftime as Antoine Griezmann finished off a well-worked team move with a clinical low strike.\r\n\r\nAfter the break, the Dutch came out determined, and their persistence paid off in the 63rd minute when Xavi Simons found the back of the net with a deflected shot that wrong-footed Mike Maignan. But any hopes of a comeback were short-lived, as substitute Ousmane Dembélé sealed the win for France with a blistering counter-attack goal in the 79th minute.\r\n\r\n\"We played with intensity and intelligence,\" said France head coach Didier Deschamps. \"This is a team that wants to go all the way, and tonight they proved it on the pitch.\"\r\n\r\nWith this result, France now prepares for a high-stakes quarterfinal showdown against Portugal — a clash that promises excitement, quality, and star power. As the tournament heats up, the French squad seems to be finding its rhythm at just the right time.', '	images/FE2.webp', 3, 1, '2025-07-29 08:15:38'),
(14, 'Nationals Take High School SS Eli Willits With No. 1 Pick', 'The Washington Nationals have selected Eli Willits as their No. 1 overall pick in the 2025 MLB Draft...\r\n\r\nIn a move that has energized their fanbase and turned heads across the baseball world, the Washington Nationals have chosen outfielder Eli Willits as the No. 1 overall pick in the 2025 MLB Draft.\r\n\r\nWillits, a 21-year-old standout from Vanderbilt University, is widely regarded as one of the most complete prospects in recent memory. Known for his explosive speed, consistent batting average, and stellar defense, Willits put up jaw-dropping numbers during the 2025 collegiate season, hitting .389 with 18 home runs, 42 stolen bases, and a .487 on-base percentage.\r\n\r\nNationals General Manager Mike Rizzo called Willits “a franchise-changing talent” during the post-draft press conference. “Eli brings a rare blend of athleticism, baseball IQ, and leadership. We believe he has all the tools to become a cornerstone of our organization for years to come,” Rizzo said.\r\n\r\nWillits expressed excitement at joining the Nationals, saying: “I’m honored to be picked first overall and can’t wait to get to work. Washington is building something special, and I want to be a big part of that.”\r\n\r\nBaseball analysts agree that Willits has the potential to make a rapid ascent through the minor leagues, with some speculating he could reach the majors as early as late 2026, depending on his development.\r\n\r\nThe Nationals, currently in a rebuilding phase, hope that this selection marks the beginning of a new era, with Willits anchoring a promising young core that includes recent top picks and international signings.', '	images/FE1.webp', 2, 1, '2025-07-29 08:16:02'),
(15, 'Breakthrough in Renewable Energy: Solar Power Reaches New Heights in 2025', 'In 2025, solar power technology has achieved remarkable efficiency gains, making renewable energy more affordable and accessible worldwide.\r\n\r\nThis year marks a significant turning point in the global transition toward sustainable energy. Advances in solar cell materials—particularly perovskite-silicon tandem cells—have pushed solar panel efficiency beyond 30%, nearly doubling what was considered standard just a decade ago.\r\n\r\nAs a result, the cost of solar installations has dropped by more than 40% compared to 2020 levels. This dramatic reduction has allowed both developed and developing nations to scale up their renewable energy infrastructure. In regions like Sub-Saharan Africa and Southeast Asia, off-grid solar solutions are now powering homes, schools, and hospitals for the first time, bridging critical energy gaps.\r\n\r\nTech giants and startups alike have contributed to this solar surge. Companies are now integrating ultra-efficient, transparent solar panels into building windows, car roofs, and even smartphone glass, creating a new generation of energy-autonomous devices and infrastructure.\r\n\r\nGovernments have also played a crucial role. Through global climate agreements and expanded green subsidies, countries are accelerating their commitments to reach net-zero carbon emissions. In 2025 alone, more than 40% of new energy projects globally have been solar-powered—a record-breaking figure.\r\n\r\nExperts predict that by 2030, solar power will be the dominant source of new electricity generation worldwide, potentially providing clean, sustainable energy to over 80% of the global population.', '	images/RE5.webp', 2, 1, '2025-07-29 08:23:29'),
(17, 'Nationals Take High School SS Eli Willits With No. 1 Pick', '\r\nIn a bold move, Jayson Tatum is reportedly trying to recruit Damian Lillard to join the Boston Celtics.\r\n\r\nAccording to multiple league sources, Tatum has been in close contact with Lillard this offseason, advocating for the All-Star point guard to consider a trade that would send him to Boston. The two players, who share a strong bond from their time together on Team USA, have reportedly discussed the potential of teaming up to chase an NBA championship.\r\n\r\nLillard, currently with the Portland Trail Blazers, has expressed frustration in the past with the franchise\'s inability to build a serious contender around him. While he has remained loyal to Portland for over a decade, insiders say he is increasingly open to exploring options that would put him in a better position to win.\r\n\r\nFor Boston, acquiring Lillard would mean pairing one of the league’s most explosive scorers with their young superstar Tatum, creating one of the most dynamic duos in the NBA. The Celtics, who reached the Eastern Conference Finals last season, are viewed as being one piece away from becoming title favorites.\r\n\r\nHowever, any potential deal would likely require a significant trade package, possibly including Marcus Smart, multiple draft picks, and other young assets. Celtics management is reportedly weighing the risks and rewards of such a blockbuster move.\r\n\r\nIf successful, this recruitment effort could shake up the NBA landscape and solidify Boston as a powerhouse for years to come. Fans and analysts alike are watching closely to see if Tatum’s pitch is enough to bring Lillard to the historic franchise.\r\n\r\n', 'images/main_news.jpeg', 3, 1, '2025-07-29 08:25:49'),
(18, '2020 NBA Offseason Buzz: Jayson Tatum Recruiting Damian Lillard \r\n', 'Jayson Tatum is reportedly trying to recruit Damian Lillard to join the Boston Celtics...\r\n\r\nIn a surprising development this offseason, Boston Celtics star Jayson Tatum is reportedly making efforts to bring Damian Lillard to Boston. Sources close to the situation reveal that Tatum has reached out to Lillard personally, emphasizing the potential of forming a championship-caliber duo in the Eastern Conference.\r\n\r\nLillard, currently with the Portland Trail Blazers, has long been admired for his loyalty, clutch shooting, and leadership. However, after multiple seasons falling short of deep playoff runs, he may be more open than ever to a change of scenery. A move to Boston would offer him a chance to play alongside a young, elite core and contend immediately.\r\n\r\nWhile no formal trade talks have been confirmed, Tatum’s active role in the recruitment hints at Boston’s seriousness in making a title push. If Lillard were to join, the Celtics could field one of the most dangerous backcourts in the NBA — a nightmare for opponents and a thrill for fans.\r\n\r\nAs the offseason unfolds, eyes will remain on both stars and whether this ambitious pairing can become a reality.', 'images/RE5.webp', 1, 1, '2025-07-29 08:26:47'),
(20, ' Al Ahly Claims CAF Champions League Title in Thrilling Finale', 'Egyptian giants Al Ahly SC have once again proven their supremacy in African football by clinching the CAF Champions League title after a dramatic 2-1 victory against Wydad Casablanca. The final, held in Cairo International Stadium, saw goals from Mohamed Sherif and Percy Tau that sealed the win. With this victory, Al Ahly extends their record to 12 titles, making them the most decorated club in African history. Celebrations erupted across Egypt as fans hailed the team’s resilience and tactical discipline under coach Marcel Koller. The win also guarantees Al Ahly a spot in the upcoming FIFA Club World Cup.\r\n\r\n', 'images/LE4.webp', 1, 1, '2025-07-30 12:56:50'),
(21, 'The Rise of Young Talent in Modern Football', 'In recent years, the world of football has witnessed an exciting surge of young talent breaking into the spotlight and redefining the game. From teenagers making debuts in top-tier leagues to under-21 players leading their national teams, the new generation is proving that age is just a number.\r\n\r\nOne of the most remarkable stories is that of Jude Bellingham. At just 20 years old, the English midfielder has become a key figure at Real Madrid, showing maturity, vision, and leadership beyond his years. His performances in La Liga and the UEFA Champions League have drawn comparisons to legends of the game.\r\n\r\nSimilarly, Barcelona\'s Lamine Yamal has emerged as one of the youngest goal-scorers in club history. His technical skills, speed, and confidence on the ball are extraordinary for someone his age. He represents a new wave of youth that thrives under pressure and adapts quickly to elite-level football.\r\n\r\nThe rise of young stars is not limited to Europe. In South America, players like Endrick from Brazil and Facundo Buonanotte from Argentina are making headlines and being scouted by major European clubs. These young athletes train in competitive environments from an early age, aided by better facilities, analytics, and mentorship.\r\n\r\nClubs today are more willing to invest in youth academies, giving talented teenagers a clear path to professional football. This change in philosophy not only rejuvenates teams but also brings fresh energy and innovation to the sport.\r\n\r\nAs the 2026 World Cup approaches, the spotlight will certainly be on these young players to shine on the world stage. Their success is a testament to how the game is evolving — faster, smarter, and more inclusive for the next generation of football legends.', 'images/cat2.jpeg', 3, 1, '2025-07-30 13:54:10'),
(23, 'The Majestic World of Horses', 'Horses have been companions to humans for thousands of years, playing vital roles in transportation, agriculture, sport, and culture. These magnificent animals belong to the genus Equus and are known for their strength, speed, and graceful movements.\r\n\r\nHistory and Domestication\r\nThe domestication of horses dates back to around 4000 BCE in the Eurasian steppes. Since then, horses have transformed civilizations by enabling faster travel, improved trade, and more effective farming methods. Their ability to carry heavy loads and pull plows made them invaluable in agricultural societies.\r\n\r\nPhysical Characteristics\r\nHorses come in a variety of breeds, sizes, and colors. The average horse stands about 5 feet tall at the shoulder and weighs between 900 to 1,200 pounds. They have long legs built for speed and endurance, a strong back, and powerful muscles. Their eyes are large and positioned on the sides of their heads, giving them a wide field of vision.\r\n\r\nBehavior and Intelligence\r\nHorses are social animals that thrive in herds. They communicate through vocalizations like neighs and whinnies, as well as body language. Horses are highly intelligent and capable of learning complex tasks. Their keen senses, especially their ability to detect movement and sounds, help them stay alert to potential dangers.\r\n\r\nUses of Horses Today\r\nWhile modern technology has replaced horses in many traditional roles, they remain popular in sports such as racing, dressage, show jumping, and rodeo. Horses also play therapeutic roles in equine-assisted therapy, helping people with physical and emotional challenges. Additionally, many people enjoy riding horses recreationally and caring for them as companions.', 'images/tr1.jpeg', 3, 1, '2025-07-30 14:09:30');

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Sports'),
(2, 'Technology'),
(3, 'Politics');

-- --------------------------------------------------------

--
-- بنية الجدول `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `comments`
--

INSERT INTO `comments` (`comment_id`, `article_id`, `user_id`, `comment_text`, `timestamp`) VALUES
(1, 17, 2, 'Great !!!!!', '2025-07-30 11:26:45'),
(6, 18, 3, 'Great article, thanks for sharing!', '2025-07-30 11:37:15'),
(7, 18, 4, 'Very informative post', '2025-07-30 11:37:45'),
(9, 15, 6, 'Thanks for the insights!', '2025-07-30 11:38:47'),
(10, 14, 7, 'Can you recommend related articles', '2025-07-30 11:39:16'),
(11, 13, 8, 'Looking forward to more articles like this.', '2025-07-30 11:39:48'),
(12, 13, 9, 'Thanks', '2025-07-30 11:40:07'),
(13, 12, 10, 'Can you recommend related articles', '2025-07-30 11:40:44'),
(14, 11, 11, 'Great article, thanks for sharing', '2025-07-30 11:41:18'),
(15, 23, 14, 'Thats Vary funny !!', '2025-08-02 06:59:20'),
(16, 23, 15, 'Amazing!!!', '2025-08-02 07:34:24');

-- --------------------------------------------------------

--
-- بنية الجدول `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `submitted_at`) VALUES
(1, 'Afnan Fayez Alzeiti', 'afnan232003@gmail.com', 'Errors', 'Somthinnng', '2025-08-02 12:10:22');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'afnan232003@gmail.com', 'admin', 'admin'),
(2, 'أفنان فايز الزيتي', NULL, NULL, 'user'),
(3, 'Ahmed Mosa', NULL, NULL, 'user'),
(4, 'Malina', NULL, NULL, 'user'),
(5, 'Mohammed Ali', NULL, NULL, 'user'),
(6, 'Jack Prer', NULL, NULL, 'user'),
(7, 'Mai sa', NULL, NULL, 'user'),
(8, 'Ameia2322', NULL, NULL, 'user'),
(9, 'ASDSD_23', NULL, NULL, 'user'),
(10, 'Maner23', NULL, NULL, 'user'),
(11, 'Mori20a', NULL, NULL, 'user'),
(13, 'FAfnan2993', 'fayezafnan0@gmail.com', '$2y$10$m/u2WiGxGzzb352yh/Iuh.nEiS2tiU/y.ctY2j3GGYgukDoQDCzbO', 'user'),
(14, '234ALI', NULL, NULL, 'user'),
(15, 'shahed2', NULL, NULL, 'user'),
(16, 'Ammeen23', 'afnan234@gmail.com', '$2y$10$9HBYRO8Ggmr5VIzetcMexuC0oQFLYUeqJ5AQU5gi5UxhNOe09.3Oy', 'user'),
(17, 'ahmed', 'ahmed23@gmail.com', '$2y$10$A.lyAyT6k1hv3YUOOupZ7eSv26axD/DBHtEWmmhLR/eMKLs67rqpq', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

--
-- قيود الجداول `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
