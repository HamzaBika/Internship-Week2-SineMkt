--
-- Database: `SineMkt`
--
-- --------------------------------------------------------
--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) NOT NULL Primary Key AUTO_INCREMENT,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_lastname` varchar(255) DEFAULT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_phone` varchar(255) DEFAULT NULL,
  `admin_adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_lastname`, `admin_username`, `admin_email`, `admin_password`, `admin_phone`, `admin_adresse`) VALUES
(1, 'Mohamed', 'Elbaik', 'admin', 'admin@admin.com', '$2y$10$qTcqOTd21nKOleiKv1UTCe294oQE.wkHI2wIpHwLgbf3y7DZ5s6Je', '696807732', 'Que Miftah Elkhair Safi');



--
-- Table structure for table `Categorie`
--
CREATE TABLE `Categorie` (
  `Categorie_Id` int(100) NOT NULL Primary key AUTO_INCREMENT,
  `Categorie_Name` varchar(255) NOT NULL,
  `Categorie_Img` varchar(255) Default NULL,
  `Categorie_Description` varchar(255) Default NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- ------------------------------------------------------
--
-- Table structure for table `Product`
--
CREATE TABLE `Product` (
  `Product_Id` int(100) NOT NULL Primary key AUTO_INCREMENT,
  `Product_Name` varchar(255) NOT NULL,
  `Product_Img` varchar(255) Default NULL,
  `Product_Description` longtext CHARACTER SET utf8 DEFAULT NULL,
  `Product_Price` int(100) NOT NULL,
  `Product_Profit` int(100) NOT NULL,
  `Product_Note` varchar(255) NOT NULL,
  `Product_Ettiquette` varchar(22550) NOT NULL,
  `Product_Categorie` int(100) NOT NULL,
  `is_active` int(100) Default 1,
  constraint `categorie_id` FOREIGN KEY (`Product_Categorie`) REFERENCES `Categorie`(`Categorie_Id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 ;
-- ------------------------------------------------------
--
-- Table structure for table `Blog`
--
CREATE TABLE `Blog` (
  `Blog_Id` int(100) NOT NULL Primary key AUTO_INCREMENT,
  `Blog_Title` varchar(255) NOT NULL,
  `Blog_Image` varchar(255) Default NULL,
  `Blog_Contenu` longtext CHARACTER SET utf8 DEFAULT NULL,
  `Blog_Author` varchar(255) Default Null,
  `Blog_Postingdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- ------------------------------------------------------
--
-- Insertion data into table `Categorie`
--
INSERT INTO `Categorie` (
    `Categorie_Id`,
    `Categorie_Name`,
    `Categorie_Img`,
    `Categorie_Description`
  )
values 
(1, 'Sofas','C1.jpg', 'All Sofas Products'),
(2, 'Chairs','C2.jpg', 'All Chairs Products'),
(3,'Bookcases','C3.jpg','All Bookcases Products'),
(4, 'Beds','C4.jpg', 'All Beds Products'),
(5, 'Tables','C5.jpg', 'All Tables Products');
-- ------------------------------------------------------
--
-- Insertion data into table `Product`
--
INSERT INTO `Product` (
    `Product_Id`,
    `Product_Name`,
    `Product_Img`,
    `Product_Description`,
    `Product_Price`,
    `Product_Profit`,
    `Product_Note`,
    `Product_Ettiquette`,
    `Product_Categorie`
  )
values (
    1,
    'Wooden Chair',
    'P1.png',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    65,
    30,
    '6 piéces en Stock',
    'nouvelle arrivée',
    2
  ),
  (
    2,
    'Single Armchair',
    'P2.png',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    80,
    25,
    '10 piéces en Stock',
    'produit vedette',
    1
  ),
  (
    3,
    'Wooden Armchair',
    'P3.png',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    40,
    15,
    '30 piéces en Stock',
    'nouvelle arrivée',
    1
  ),
  (
    4,
    'Stylish Chair',
    'P4.png',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    100,
    40,
    '28 piéces en Stock',
    'produit vedette',
    2
  ),
  (
    5,
    'Modern Chair',
    'P5.png',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    120,
    35,
    '36 piéces en Stock',
    'produit vedette',
    2
  ),
  (
    6,
    'Mapple Wood Dinning Table',
    'P6.png',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    140,
    42,
    '4 piéces en Stock',
    'nouvelle arrivée',
    5
  ),
  (
    7,
    'Arm Chair',
    'P7.png',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    90,
    38,
    '28 piéces en Stock',
    'produit vedette',
    1
  ),
  (
    8,
    'Wooden Bed',
    'P8.png',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    140,
    60,
    '6 piéces en Stock',
    'nouvelle arrivée',
    4
  ),
  (
    9,
    'Chair',
    'P9.png',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    99,
    14,
    '8 piéces en Stock',
    'nouvelle arrivée',
    1
  ),
  (
    10,
    'Stool and Chair',
    'P10.png',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    120,
    45,
    '12 piéces en Stock',
    'produit vedette',
    2
  ),
  (
    11,
    'Hanging Lamp',
    'P11.png',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    80,
    17,
    '6 piéces en Stock',
    'nouvelle arrivée',
    4
  ),
  (
    12,
    'Designed Sofa',
    'P12.jpg',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    160,
    60,
    '18 piéces en Stock',
    'produit vedette',
    1
  ),
  (
    13,
    'Dinning Table',
    'P13.jpg',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    200,
    110,
    '20 piéces en Stock',
    'nouvelle arrivée',
    1
  ),
  (
    14,
    'Chair And Table',
    'P14.jpg',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    100,
    30,
    '23 piéces en Stock',
    'produit vedette',
    5
  ),
  (
    15,
    'Modern Arm Chair',
    'P15.jpg',
    'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
    299,
    150,
    '14 piéces en Stock',
    'nouvelle arrivée',
    2
  );
-- ------------------------------------------------------
--
-- Insertion data into table `Blog`
--
INSERT INTO `Blog` (
    `Blog_Id`,
    `Blog_Title`,
    `Blog_Image`,
    `Blog_Contenu`,
    `Blog_Author`,
    `Blog_Postingdate`
  )
values (
    1,
    'Introducing the Karman Chair',
    'blog1.jpg',
    'On May 15th, 2023, the Karman Chair officially hit the market. Karman is the latest ergonomic design by Steelcase. The premium office chair world is crowded and highly competitive. So, what sets the Karman Chair apart?

Weight
The biggest differentiator for the Karman Chair is its weight. The Karman is impossibly light. Steelcase developed a lightweight but incredibly durable frame for the chair. In fact, the Karman weighs in just under 29 lbs. By comparison, many of Karman’s competitors can exceed 70 lbs. Although lightweight, the Karman Chair is a commercial-grade ergonomic task chair. But it also makes a perfect WFH chair especially if you need to move around from time to time.

Mesh
Steelcase developed a proprietary performance mesh for the seat and back of the chair. The mesh seat and back encourage airflow preventing heat build-up. If you are a fan of padded upholstered seats, don’t write the Karman off just yet. Steelcase designed the Karman Chair with a patented hybrid seat. The mesh suspension seat comes with an integrated cushion to provide maximum comfort. The mesh is available in a variety of different colors and even a selection of tri-colored meshes.

Style
This is a stylish office chair. You can customize the look of the chair in several different ways. There are three parts or sections of the chair and a nice palette of colors to work with. The chair in the video below is black on black on black. The frame, arms/base, and mesh are all black. You can mix and match many colors at each of these positions to create the perfect chair for your workspace. This makes the Karman Chair perfect for brand colors of to seamlessly integrate with your home office aesthetic.

In the video below you will see our first look at the Karman Chair.

', 'Mohamed Doukkani',
    '2023-06-22 15:45:38'
  ),
  (
    2,
    '5 Kitchen Trends You Don’t Want to Miss Out On in 2023',
    'blog2.png',
    'Combining Different Materials and Textures

According to a majority of 74% of experts, including a mix of materials is going to be one of the most sought-after design elements in kitchens in 2023. By having a variety of materials in the kitchen, the space appears to have more depth and is more interesting. This could be achieved by, for example, using a wooden countertop on the island and stone countertops on the perimeter. Renovating a kitchen with new materials can be expensive ($5,500 to $13,500 if you only change countertops and cabinetry). Yet you could also achieve this dynamism with smaller changes by mixing different metal finishes for appliances and hardware or even adding extra touches with metallic-hue placemats (4 for $42). Combining materials and textures is a great way to add design styles to others. 

Storage That Is Hidden
Clutter can make life more difficult, taking up space and putting off potential home buyers if you are looking to sell. Although open shelving has been popular for a few years now, seeing shelves overflowing with kitchen accessories can distract you from the overall design. To improve the aesthetics and functionality of your kitchen, hidden storage is a must-have feature. 53% of interior design pros agree, believing it will be the biggest kitchen trend this year. Adding some extra cabinetry will cost you around $200 to $1,000 per linear foot. This way you can keep unsightly objects out of view while keeping your kitchen well-organized. 

Statement Lighting

When asked which will be the biggest kitchen trend, 47% of experts said statement lighting. Adding a feature that really draws the eye is one way of improving your kitchen’s design. One option that is both useful and eye-catching is statement lighting. Having a dynamic fixture such as string lamp pendants ($752.25) hanging above the kitchen island or the dining table serves as task lighting, but also highlights kitchen features. It can also work as ambient lighting in the kitchen overall.

Large, Oversized Windows
Allowing as much natural light into the kitchen as possible will be something many homeowners will be looking to achieve when carrying out their kitchen renovation. Blending outdoors with indoors has been popular ever since the pandemic, as people have sought to reconnect with nature as much as possible. Replacing your kitchen windows with larger, oversized ones is one way you can bring in as much light and views of your outside space as possible. The cost of replacing a window in a kitchen rounds $300 – $700, but make sure to add some extra hundred dollars to make the opening larger. 39% of design professionals agree that it is going to be the top trend for 2023. 

Vintage Features
retro kitchen
While many homeowners look to modernize their kitchen spaces with contemporary design features, an update doesn’t necessarily mean excluding vintage features. 36% of interior designers say that vintage features are going to be one of the top kitchen trends this year. Traditional aspects can bring a charming feel to the space, making it more homely. These can include furniture for storage, old-style stoves, and even wallpaper. Consider a trolley with extra storage space to add a rustic accent to the kitchen or dining room ($1,085.00). Or, if you are looking for something with a retro vibe, consider the Arcade Bar Cart by GUS*

Above all, your kitchen is one of the most important gathering spaces for friends and family. Make your kitchen a place you love and love to show off!',
    'Albert Josh',
    '2023-06-24 15:45:38'
  ),
  (
    3,
    'Herman Miller Molded Chairs – Fiberglass vs. Plastic',
    'blog3.png',
    'The Eames Molded chairs are a core furniture collection for Herman Miller. These chairs, designed by Charles and Ray Eames, are still wildly popular nearly 75 years later. This video explores the history of the Eames Molded Chairs. We look at three classic chair designs; the fiberglass counter stool, the molded plastic task chair, and the classic molded plastic armchair. Join us for this trip through furniture history.',
    'Albert Fred',
    '2023-06-25 15:45:38'
  );