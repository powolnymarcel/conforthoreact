-- Adminer 4.8.4 MySQL 8.0.36 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `a_propos`;
CREATE TABLE `a_propos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sentences` json NOT NULL,
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `a_propos` (`id`, `title`, `description`, `sentences`, `image_1`, `image_2`, `created_at`, `updated_at`) VALUES
(2,	'À Propos de Confortho Bandagisterie',	'<p>Confortho est votre partenaire de confiance en bandagisterie, spécialisé dans le confort et le bien-être des personnes nécessitant des équipements orthopédiques adaptés. Nous offrons des solutions de qualité pour faciliter votre quotidien et accélérer votre rétablissement.</p>',	'[{\"sentence\": \"Chez Confortho, nous mettons l’accent sur des dispositifs orthopédiques alliant confort, durabilité et efficacité.\"}, {\"sentence\": \"Notre gamme de produits est soigneusement sélectionnée pour répondre aux besoins spécifiques de chaque patient.\"}, {\"sentence\": \"Grâce à notre expertise, nous accompagnons votre mobilité avec des solutions sur mesure adaptées à toutes les situations.\"}, {\"sentence\": \"Nos orthèses et accessoires garantissent un soutien optimal pour une récupération en toute sérénité.\"}, {\"sentence\": \"Confortho s’engage à offrir un service personnalisé et humain, parce que votre confort est notre priorité.\"}]',	'01JF54GCXC3A3KFTJPZENZ7K1Q.webp',	'01JF54GCXHJ0BAR1QKGZ68D2YP.jpg',	'2024-12-15 11:21:46',	'2024-12-15 11:25:49');

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `blogs` (`id`, `title`, `category`, `image`, `date`, `user_name`, `user_firstname`, `content`, `slug`, `created_at`, `updated_at`) VALUES
(1,	'Les nouvelles tendances en orthopédie',	'Orthopédie',	'01JF527W8471W90M1GC9XDTRBF.jpg',	'2024-09-25',	'Durand',	'Jean',	'<h3><strong>Introduction</strong></h3><p>L\'orthopédie est un domaine en constante évolution. Les innovations technologiques, les nouveaux matériaux et les approches personnalisées permettent aujourd\'hui d\'offrir des solutions plus efficaces, confortables et adaptées aux besoins des patients. Dans cet article, nous vous présentons les <strong>nouvelles tendances en orthopédie</strong> qui redéfinissent le secteur pour les professionnels de la santé et les patients.</p><h3><strong>1. Matériaux innovants pour plus de légèreté et de confort</strong></h3><p>Les matériaux traditionnels comme le plâtre ou le métal sont peu à peu remplacés par des alternatives modernes :</p><ul><li><strong>Fibres de carbone</strong> : Légères et robustes, elles permettent de concevoir des attelles et des prothèses plus faciles à porter au quotidien.</li><li><strong>Polymères intelligents</strong> : Ces matériaux s\'adaptent à la température du corps pour plus de confort.</li><li><strong>Impression 3D</strong> : Elle permet de créer des orthèses sur mesure à la fois solides et ultralégères, optimisant le confort et l\'ajustement.</li></ul><blockquote><em>\"Le confort et la durabilité des dispositifs ont connu des avancées majeures grâce aux nouveaux matériaux.\"</em></blockquote><h3><strong>2. L\'orthopédie connectée : les dispositifs intelligents</strong></h3><p>L\'essor des technologies connectées transforme l\'expérience des patients :</p><ul><li><strong>Orthèses connectées</strong> : Ces dispositifs intègrent des capteurs qui collectent des données sur les mouvements du patient, permettant un suivi précis.</li><li><strong>Applications mobiles</strong> : Elles accompagnent les patients avec des conseils personnalisés, des exercices de rééducation et des notifications de suivi.</li><li><strong>Prothèses bioniques</strong> : Grâce à des capteurs électroniques, ces prothèses réagissent aux impulsions nerveuses pour des mouvements naturels et fluides.</li></ul><h3><strong>3. Personnalisation grâce à l\'impression 3D</strong></h3><p>L’impression 3D est en train de révolutionner l’orthopédie :</p><ul><li><strong>Adaptation morphologique</strong> : Chaque dispositif est conçu spécifiquement pour l\'anatomie du patient, garantissant une meilleure efficacité et un confort optimal.</li><li><strong>Gain de temps</strong> : Les orthèses et prothèses peuvent être fabriquées rapidement, réduisant les délais d’attente.</li><li><strong>Coûts réduits</strong> : La production sur mesure devient de plus en plus accessible grâce à cette technologie.</li></ul><p><em>Exemple : les semelles orthopédiques imprimées en 3D offrent un support parfaitement ajusté pour chaque pied.</em></p><h3><strong>4. L\'importance croissante de l\'ergonomie</strong></h3><p>Les nouvelles solutions orthopédiques sont conçues pour s\'intégrer naturellement dans le quotidien :</p><ul><li><strong>Design discret et esthétique</strong> : Les orthèses et prothèses sont plus élégantes et moins visibles.</li><li><strong>Facilité d’utilisation</strong> : Les dispositifs sont pensés pour être faciles à enfiler et à ajuster sans assistance.</li><li><strong>Mobilité améliorée</strong> : Les nouvelles générations d’aides à la marche et de prothèses permettent une plus grande autonomie pour les patients.</li></ul><h3><strong>5. Rééducation et orthopédie : l\'essor des thérapies assistées</strong></h3><p>Les solutions orthopédiques modernes sont souvent accompagnées d\'outils de rééducation innovants :</p><ul><li><strong>Robots de rééducation</strong> : Ils assistent les mouvements pour réapprendre progressivement à marcher ou à utiliser un membre.</li><li><strong>Exosquelettes</strong> : Ils permettent d\'accompagner les patients dans leurs gestes quotidiens tout en favorisant une récupération musculaire optimale.</li><li><strong>Rééducation virtuelle</strong> : Des applications utilisant la <strong>réalité virtuelle</strong> proposent des exercices interactifs pour motiver les patients.</li></ul><h3><strong>6. Éco-responsabilité dans les dispositifs orthopédiques</strong></h3><p>La durabilité est aujourd’hui au cœur des préoccupations :</p><ul><li>Utilisation de matériaux <strong>recyclables</strong> et <strong>biosourcés</strong>.</li><li>Conception de dispositifs <strong>réutilisables</strong> ou <strong>réparables</strong> pour limiter les déchets.</li><li>Fabrication locale pour réduire l\'empreinte carbone.</li></ul><p><br></p>',	'nouvelles-tendances-orthopedie',	'2024-09-27 17:14:49',	'2024-12-15 10:46:13'),
(2,	'L\'importance des semelles orthopédiques',	'Semelles',	'01JF52C7X6K551MS39AHR61Z10.jpg',	'2024-09-27',	'Martin',	'Sophie',	'<h3><strong>Introduction</strong></h3><p>Les semelles orthopédiques jouent un rôle essentiel dans le <strong>bien-être quotidien</strong> et la <strong>santé des pieds</strong>. Conçues sur mesure pour corriger la posture, réduire les douleurs ou accompagner des pathologies spécifiques, elles sont bien plus qu’un simple accessoire. Découvrez dans cet article <strong>pourquoi les semelles orthopédiques</strong> sont importantes et comment elles peuvent améliorer votre qualité de vie.</p><h3><strong>1. Une solution adaptée pour les douleurs plantaires</strong></h3><p>Les douleurs aux pieds sont fréquentes, qu’elles soient liées à une posture inadéquate, à une activité sportive ou à des pathologies comme la fasciite plantaire. Les semelles orthopédiques permettent de :</p><ul><li><strong>Répartir la pression</strong> sous le pied.</li><li><strong>Amortir les chocs</strong> lors de la marche ou de la course.</li><li><strong>Soulager les zones douloureuses</strong>, comme les talons ou la voûte plantaire.</li></ul><blockquote><em>\"Des semelles bien ajustées réduisent considérablement les douleurs et préviennent les blessures chroniques.\"</em></blockquote><h3><strong>2. Correction des troubles posturaux</strong></h3><p>Une mauvaise posture peut entraîner des douleurs au niveau des <strong>genoux</strong>, des <strong>hanches</strong> et même du <strong>dos</strong>. Les semelles orthopédiques corrigent ces déséquilibres en agissant directement sur l’appui plantaire.</p><ul><li>Elles alignent correctement les pieds pour améliorer la posture globale.</li><li>Elles soulagent les douleurs articulaires liées à des troubles comme le <strong>pied plat</strong> ou le <strong>pied creux</strong>.</li><li>Elles contribuent à la prévention des <strong>déformations</strong> comme les hallux valgus.</li></ul><p><em>Exemple : un pied mal positionné peut entraîner des douleurs dorsales qui s’installent avec le temps. Les semelles personnalisées corrigent ce problème à la source.</em></p><h3><strong>3. Amélioration des performances sportives</strong></h3><p>Pour les sportifs, l’utilisation de semelles orthopédiques offre de nombreux avantages :</p><ul><li><strong>Absorption des chocs</strong> pour protéger les articulations.</li><li><strong>Amélioration de l\'équilibre</strong> et de la stabilité.</li><li><strong>Prévention des blessures</strong> comme les tendinites ou les fractures de fatigue.</li><li>Optimisation de l’<strong>efficacité du mouvement</strong>, notamment pour les coureurs et les athlètes.</li></ul><h3><strong>4. Un allié pour les pathologies chroniques</strong></h3><p>Les semelles orthopédiques sont recommandées pour traiter ou accompagner diverses pathologies :</p><ul><li><strong>Diabète</strong> : Les semelles préviennent les plaies et ulcères en répartissant les points de pression.</li><li><strong>Arthrose</strong> : Elles réduisent les douleurs articulaires et améliorent la marche.</li><li><strong>Inégalités de longueur des membres inférieurs</strong> : Elles compensent la différence et équilibrent la posture.</li></ul><p>Grâce à une conception personnalisée, elles répondent aux besoins spécifiques de chaque patient, quel que soit son âge.</p><h3><strong>5. Amélioration du confort au quotidien</strong></h3><p>Que vous soyez debout toute la journée, en déplacement ou sédentaire, des semelles adaptées améliorent votre confort général :</p><ul><li>Elles <strong>réduisent la fatigue</strong> musculaire.</li><li>Elles offrent un <strong>maintien optimal</strong> de la voûte plantaire.</li><li>Elles s’adaptent à <strong>tous types de chaussures</strong>, du quotidien aux chaussures professionnelles.</li></ul><blockquote><em>\"Des semelles orthopédiques bien ajustées améliorent votre mobilité et votre confort au quotidien.\"</em></blockquote><h3><strong>6. Conception sur mesure : une garantie d’efficacité</strong></h3><p>Contrairement aux semelles standards, les semelles orthopédiques sur mesure sont conçues spécifiquement pour chaque pied :</p><ul><li>Analyse approfondie de votre <strong>posture</strong> et de vos <strong>appuis</strong>.</li><li>Utilisation de <strong>technologies avancées</strong> comme l’impression 3D pour un ajustement parfait.</li><li>Fabrication avec des <strong>matériaux adaptés</strong> pour un confort durable (mousse, gel, fibres légères).</li></ul><h3><strong>Conclusion</strong></h3><p>Les semelles orthopédiques ne sont pas seulement un dispositif médical, elles représentent une véritable solution pour améliorer le confort, soulager les douleurs et traiter des pathologies spécifiques. Chez <strong>Confortho</strong>, nos spécialistes vous accompagnent pour réaliser des semelles <strong>sur mesure</strong>, adaptées à vos besoins et à votre quotidien.</p><p>N’attendez plus pour prendre soin de vos pieds !</p><p><br></p>',	'importance-semelles-orthopediques',	'2024-09-27 17:14:49',	'2024-12-15 10:48:36'),
(3,	'Rééducation après une prothèse',	'Prothèses',	'01JF59SDERZZZHM2XKYVNY2028.jpg',	'2024-09-28',	'Lefevre',	'Claire',	'<h3><strong>Rééducation après une prothèse : Guide complet pour une récupération optimale</strong></h3><p>La pose d’une prothèse, qu’elle soit de la hanche, du genou ou d’une autre articulation, est une intervention qui améliore significativement la mobilité et la qualité de vie. Toutefois, la réussite de cette intervention repose en grande partie sur une rééducation adéquate. Voici un guide pour mieux comprendre les étapes de la rééducation et les bonnes pratiques pour optimiser votre récupération.</p><h3><strong>1. L\'importance de la rééducation</strong></h3><p>La rééducation joue un rôle essentiel dans :</p><ul><li><strong>La restauration de la mobilité</strong> : Réapprendre à marcher ou à utiliser l’articulation.</li><li><strong>Le renforcement musculaire</strong> : Les muscles entourant la prothèse doivent être sollicités pour soutenir l’articulation.</li><li><strong>La réduction des douleurs</strong> : Une mobilisation douce et progressive permet d\'éviter les raideurs.</li><li><strong>La reprise des activités quotidiennes</strong> : L\'objectif final est de retrouver une autonomie complète.</li></ul><h3><strong>2. Les différentes étapes de la rééducation</strong></h3><p><strong>A. Phase précoce (Jours 1 à 10)</strong></p><ul><li><strong>Objectif</strong> : Réduire l\'œdème, mobiliser doucement l\'articulation et prévenir les complications.</li><li>Exercices légers : Flexion/extension de l\'articulation selon les recommandations du kinésithérapeute.</li><li><strong>Utilisation d’aides</strong> : Une canne ou un déambulateur peut être nécessaire pour la marche.</li></ul><p><strong>B. Phase intermédiaire (Semaines 2 à 6)</strong></p><ul><li><strong>Objectif</strong> : Récupérer la mobilité et la force musculaire.</li><li>Exercices plus intenses : Renforcement musculaire ciblé (quadriceps, ischio-jambiers, etc.) et travail de l’équilibre.</li><li><strong>Suivi en kinésithérapie</strong> : Des séances régulières, en cabinet ou en centre de rééducation, sont essentielles.</li></ul><p><strong>C. Phase avancée (À partir de 6 semaines)</strong></p><ul><li><strong>Objectif</strong> : Retour à une autonomie totale et reprise progressive des activités normales.</li><li>Exercices fonctionnels : Montée d’escaliers, marche prolongée, vélo d’appartement ou natation.</li><li><strong>Retour aux activités sportives légères</strong> : Selon les conseils du chirurgien et du kinésithérapeute.</li></ul><h3><strong>3. Les erreurs à éviter</strong></h3><ul><li><strong>Négliger les exercices prescrits</strong> : La régularité est cruciale pour une récupération optimale.</li><li><strong>Forcer sur l’articulation trop tôt</strong> : Une progression douce est primordiale pour éviter des complications.</li><li><strong>Ignorer les douleurs persistantes</strong> : Toute douleur inhabituelle doit être signalée au professionnel de santé.</li></ul><h3><strong>4. Conseils pour une rééducation réussie</strong></h3><ul><li><strong>Hydratation et nutrition</strong> : Une alimentation équilibrée riche en protéines et en calcium favorise la réparation musculaire et osseuse.</li><li><strong>Repos adapté</strong> : Alternez les phases d\'exercices avec des moments de repos.</li><li><strong>Suivi régulier</strong> : Consultez votre kinésithérapeute et chirurgien pour ajuster les étapes de la rééducation.</li></ul><h3><strong>Conclusion</strong></h3><p>La rééducation après une prothèse est un processus qui demande de la patience et de la rigueur. En suivant les étapes recommandées et en étant assidu dans vos exercices, vous retrouverez votre mobilité et vos activités quotidiennes. N’hésitez pas à vous entourer de professionnels compétents pour vous accompagner tout au long de ce parcours.</p><p>Pour toute question ou besoin de conseil sur les aides à la rééducation, <strong>contactez-nous chez Confortho</strong>, votre partenaire en bandagisterie et orthopédie.</p><p><br></p>',	'reeducation-apres-prothese',	'2024-09-27 17:14:49',	'2024-12-15 12:58:08');

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `deroulants`;
CREATE TABLE `deroulants` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `deroulants` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1,	'Orthopédie',	'2024-09-27 17:14:49',	'2024-09-27 17:14:49'),
(2,	'Bandages',	'2024-09-27 17:14:49',	'2024-09-27 17:14:49'),
(3,	'Semelles',	'2024-09-27 17:14:49',	'2024-09-27 17:14:49'),
(4,	'Prothèses',	'2024-09-27 17:14:49',	'2024-09-27 17:14:49');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'0001_01_01_000000_create_users_table',	1),
(2,	'0001_01_01_000001_create_cache_table',	1),
(3,	'0001_01_01_000002_create_jobs_table',	1),
(4,	'2024_09_25_124927_create_slides_table',	1),
(5,	'2024_09_25_130353_create_settings_table',	1),
(6,	'2024_09_25_131257_create_blogs_table',	1),
(7,	'2024_09_25_131814_create_specialistes_table',	1),
(8,	'2024_09_25_133023_create_specialites_table',	1),
(9,	'2024_09_25_133334_create_product_categories_table',	1),
(10,	'2024_09_25_133348_create_products_table',	1),
(11,	'2024_09_25_135452_create_contacts_table',	1),
(12,	'2024_09_25_165156_create_section1_table',	1),
(13,	'2024_09_25_165157_create_section2_table',	1),
(14,	'2024_09_25_165157_create_section3_table',	1),
(15,	'2024_09_25_165158_create_section4_table',	1),
(16,	'2024_09_25_173043_create_deroulants_table',	1),
(17,	'2024_09_27_112356_create_a_propos_table',	1),
(18,	'2024_09_27_131417_create_pros_table',	1);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_categories_title_unique` (`title`),
  UNIQUE KEY `product_categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_categories` (`id`, `title`, `slug`, `picture`, `description`, `created_at`, `updated_at`) VALUES
(1,	'Orthèses & bandages',	'ortheses-bandages',	'01JF537NCYVZKPJKGH3AQSMHM7.jpg',	'<p>Découvrez notre gamme d’<strong>orthèses et bandages</strong>, conçue pour apporter <strong>soutien</strong>, <strong>stabilité</strong> et <strong>soulagement</strong> aux articulations et aux muscles. Idéals pour traiter les blessures, réduire les douleurs ou prévenir les récidives, nos dispositifs sont adaptés à chaque besoin : genoux, chevilles, poignets, coudes ou dos. Fabriqués avec des matériaux de qualité, ils offrent un <strong>confort optimal</strong> tout en favorisant une <strong>récupération rapide et efficace</strong>.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:03:34'),
(2,	'Semelles',	'semelles',	'01JF53HTRFG3RKF56Z85J00BQZ.jpg',	'<p>Les <strong>semelles orthopédiques</strong> sur mesure sont conçues pour corriger les troubles posturaux, soulager les douleurs et améliorer votre confort lors de la marche ou de la course. Adaptées à vos besoins spécifiques, elles offrent un soutien optimal à votre voûte plantaire et répartissent les pressions exercées sur vos pieds. Idéales pour traiter des pathologies comme le pied plat, la fasciite plantaire ou les douleurs lombaires, nos semelles allient <strong>précision</strong>, <strong>durabilité</strong> et <strong>efficacité</strong> pour un bien-être au quotidien.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:09:08'),
(3,	'Chaussures orthopédiques',	'chaussures-orthopediques',	'01J8TH0AXX22V6JGDGZBM87XAF.jpg',	'<p>Nos <strong>chaussures orthopédiques</strong> allient confort, style et fonctionnalité pour répondre aux besoins spécifiques de vos pieds. Conçues pour soulager les douleurs, corriger les déformations et améliorer la posture, elles s’adaptent parfaitement à votre morphologie grâce à des matériaux de haute qualité et une conception sur mesure. Idéales pour un usage quotidien, elles offrent un <strong>maintien optimal</strong> et une <strong>durabilité exceptionnelle</strong>.</p><p><br></p>',	'2024-09-27 17:14:49',	'2024-12-15 10:57:23'),
(4,	'Orthèses d\'assise',	'ortheses-dassise',	'01JF538BRQDG717C0ZACKZNRNS.jpg',	'<p>Les <strong>orthèses d\'assise</strong> sont spécialement conçues pour améliorer le <strong>confort</strong>, la <strong>posture</strong> et le <strong>soutien</strong> des personnes en position assise prolongée. Idéales pour les utilisateurs de fauteuils roulants ou les personnes souffrant de troubles posturaux, elles permettent de prévenir les douleurs, les déformations et les escarres. Nos orthèses d\'assise sont fabriquées sur mesure pour répondre à vos besoins spécifiques, en alliant <strong>ergonomie</strong>, <strong>durabilité</strong> et <strong>facilité d’entretien</strong>.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:03:57'),
(5,	'Prothèses',	'protheses',	'01JF53FFR7HK2HV9MCWA2YYC0Y.jpg',	'<p>Les <strong>prothèses</strong> représentent une solution essentielle pour restaurer la mobilité et améliorer la qualité de vie des personnes ayant subi une amputation. Conçues sur mesure, nos prothèses s’adaptent parfaitement à la morphologie et aux besoins de chaque patient. Grâce aux technologies modernes et aux matériaux avancés, elles offrent un <strong>confort optimal</strong>, une <strong>stabilité renforcée</strong> et une <strong>liberté de mouvement</strong> exceptionnelle. Notre objectif : vous accompagner dans votre réadaptation pour retrouver votre autonomie en toute sérénité.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:07:51'),
(6,	'Aides à la mobilité',	'aides-a-la-mobilite',	'01J8TGZVTKDQ03SYVNPW6XA3E0.jpg',	'<p>Découvrez notre gamme complète d’<strong>aides à la mobilité</strong> conçues pour faciliter vos déplacements au quotidien. Que ce soit pour une utilisation temporaire ou permanente, nous proposons des solutions adaptées à chaque besoin : cannes, déambulateurs, fauteuils roulants et scooters électriques. Nos produits allient <strong>confort, sécurité et ergonomie</strong>, afin de vous offrir une autonomie optimale en toute circonstance</p>',	'2024-09-27 17:14:49',	'2024-12-15 10:56:49'),
(7,	'Vêtements de compression',	'vetements-de-compression',	'01JF53JRFYWD7ARPK3TXBE8MDK.jpg',	'<p>Les <strong>vêtements de compression</strong> sont conçus pour améliorer la circulation sanguine, réduire les douleurs et favoriser la récupération musculaire. Idéaux pour traiter des pathologies comme les varices, l’œdème ou les troubles veineux, ces vêtements apportent un soutien ciblé tout en offrant un confort optimal. Disponibles en différentes tailles et niveaux de compression, ils sont adaptés à un usage quotidien ou post-chirurgical. Nos vêtements allient <strong>efficacité thérapeutique</strong>, <strong>élégance</strong> et <strong>durabilité</strong> pour répondre à vos besoins spécifiques.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:09:38'),
(8,	'Prothèses mammaires',	'protheses-mammaires',	'01JF53FV7VQ1MFJ18VADSB0J1M.jpg',	'<p>Les <strong>prothèses mammaires</strong> sont conçues pour offrir une solution naturelle et confortable aux femmes ayant subi une mastectomie ou une chirurgie mammaire. Fabriquées avec des matériaux doux et légers, elles s’adaptent parfaitement à la morphologie pour garantir une <strong>apparence naturelle</strong> et un <strong>bien-être au quotidien</strong>. Disponibles en plusieurs tailles et formes, nos prothèses mammaires sont pensées pour redonner <strong>confiance</strong> et <strong>équilibre</strong> tout en respectant les besoins spécifiques de chaque femme.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:08:03'),
(9,	'Pédiatrie',	'pediatrie',	'01JF53EDW7G8HZQVC15F6X5ZB5.jpg',	'<p>La <strong>pédiatrie orthopédique</strong> se concentre sur les besoins spécifiques des enfants en pleine croissance. Nous proposons des solutions adaptées pour traiter et prévenir les troubles posturaux, les malformations congénitales et les blessures liées à l’activité. Orthèses, semelles sur mesure, dispositifs d’assistance… chaque produit est conçu pour offrir un <strong>soutien optimal</strong>, tout en respectant le confort et la mobilité des plus jeunes. Notre objectif : accompagner leur développement en toute sérénité.</p><p><br></p>',	'2024-09-27 17:14:49',	'2024-12-15 11:07:16'),
(10,	'Colonne vertébrale',	'colonne-vertebrale',	'01J8TH388YA00637G3B5Y1Z5NX.png',	'<p>Prenez soin de votre <strong>colonne vertébrale</strong> avec nos solutions adaptées pour soulager les douleurs dorsales, corriger la posture et améliorer votre qualité de vie. Que ce soit pour des problèmes liés à une mauvaise posture, des troubles dégénératifs ou des besoins post-opératoires, nous proposons des dispositifs de soutien comme des orthèses dorsales, ceintures lombaires et accessoires ergonomiques. Retrouvez un <strong>alignement optimal</strong> et un <strong>confort durable</strong> au quotidien.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:00:29'),
(11,	'Médecine du sport',	'medecine-du-sport',	'01JF535JYHBED7KNTYK9XTHKS5.jpg',	'<p>La <strong>médecine du sport</strong> accompagne les sportifs de tous niveaux dans la <strong>prévention</strong>, le <strong>traitement</strong> et la <strong>rééducation</strong> des blessures liées à l’activité physique. Grâce à des solutions personnalisées, comme des orthèses spécifiques, des semelles orthopédiques et des programmes de rééducation adaptés, nous vous aidons à optimiser vos performances tout en préservant votre santé. Notre objectif : favoriser une <strong>récupération rapide</strong> et garantir une pratique sportive <strong>saine et durable</strong>.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:02:26'),
(12,	'Remplacement total des articulations',	'remplacement-total-des-articulations',	'01JF53GRM3JF59ADBVPSC1WQ3D.jpg',	'<p>Le <strong>remplacement total des articulations</strong> est une solution chirurgicale majeure pour retrouver une mobilité optimale et soulager les douleurs chroniques causées par l’usure ou les blessures. Que ce soit pour une hanche, un genou ou une autre articulation, cette intervention permet de remplacer les surfaces endommagées par des prothèses modernes et durables. Accompagnée d’une <strong>rééducation adaptée</strong>, cette procédure offre une amélioration significative de la qualité de vie, en redonnant <strong>confort</strong>, <strong>stabilité</strong> et <strong>autonomie</strong> au patient.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:08:33'),
(13,	'Traumatologie',	'traumatologie',	'01JF53J965V4FV6E7AHAPQXMHK.jpg',	'<p>La <strong>traumatologie</strong> se concentre sur la prise en charge des blessures liées aux accidents ou aux chocs, qu’il s’agisse de fractures, entorses, luxations ou lésions musculaires. Nous proposons des solutions adaptées, telles que des orthèses, des bandages de soutien et des programmes de rééducation personnalisés, pour favoriser une <strong>récupération rapide</strong> et prévenir les complications. Avec une approche alliant expertise et technologies modernes, la traumatologie vise à restaurer votre <strong>mobilité</strong>, votre <strong>confort</strong> et votre <strong>autonomie</strong>.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:09:22'),
(14,	'Membre supérieur',	'membre-superieur',	'01JF5373K4T7X65XPV5EMFAXR5.jpg',	'<p>Nos solutions pour le <strong>membre supérieur</strong> sont conçues pour accompagner le traitement des blessures, des pathologies et des postures liées aux bras, épaules, coudes et poignets. Nous proposons des orthèses, attelles et dispositifs de soutien adaptés pour <strong>immobiliser, stabiliser</strong> et <strong>soulager</strong> les douleurs tout en facilitant la récupération. Que ce soit pour une <strong>rééducation post-opératoire</strong> ou un traitement conservateur, nos produits allient <strong>confort</strong> et <strong>efficacité</strong> au quotidien.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:03:16'),
(15,	'Chiropratique',	'chiropratique',	'01J8TH1CSZJS7FEY5XAAWF1MK4.jpeg',	'<p>La <strong>chiropratique</strong> est une solution naturelle et efficace pour soulager vos douleurs articulaires et améliorer votre posture. Grâce à des techniques manuelles ciblées, elle permet de rétablir l’<strong>alignement de la colonne vertébrale</strong>, d’améliorer la mobilité et de réduire les tensions musculaires. Adaptée à toutes les tranches d’âge, la chiropratique contribue à un <strong>bien-être global</strong> en favorisant l’équilibre du corps et la prévention des troubles chroniques.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:00:12'),
(16,	'Gestion interventionnelle de la douleur',	'gestion-interventionnelle-de-la-douleur',	'01JF534ZBH3YCW0QM9JHWFWN5C.jpg',	'<p>La <strong>gestion interventionnelle de la douleur</strong> offre des solutions ciblées pour soulager les douleurs chroniques ou aiguës grâce à des techniques médicales avancées. En combinant des approches telles que les infiltrations, les dispositifs de soutien et les thérapies physiques, nous visons à réduire l\'intensité de la douleur, améliorer la mobilité et restaurer votre confort quotidien. Notre approche personnalisée garantit un <strong>soulagement efficace</strong> et durable pour retrouver une <strong>meilleure qualité de vie</strong>.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:02:06'),
(17,	'Rééducation & Médecine Physique',	'reeducation-medecine-physique',	'01JF53G8VW96BNWBBY1N1CHVPM.jpg',	'<p>La <strong>rééducation et médecine physique</strong> se consacrent à la restauration de vos capacités fonctionnelles après une blessure, une intervention chirurgicale ou une maladie chronique. Grâce à des programmes personnalisés, nous combinons exercices thérapeutiques, dispositifs adaptés et techniques modernes pour vous aider à retrouver mobilité, force et autonomie. Notre approche globale intègre des solutions telles que les <strong>orthèses</strong>, la <strong>physiothérapie</strong> et la <strong>gestion de la douleur</strong>, afin d\'améliorer votre qualité de vie au quotidien.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:08:17'),
(18,	'Podologie',	'podologie',	'01JF53F3ZDM52QJ7AFZC3D138D.jpg',	'<p>La <strong>podologie</strong> se spécialise dans la santé et le bien-être des pieds, essentiels pour une posture et une mobilité optimales. Nous proposons des solutions personnalisées telles que des <strong>semelles orthopédiques sur mesure</strong>, des traitements pour les affections courantes (hallux valgus, fasciite plantaire) et des conseils pour prévenir les douleurs liées à la marche ou à l’activité physique. En prenant soin de vos pieds, la podologie contribue à améliorer votre <strong>équilibre</strong>, votre <strong>confort</strong> et votre <strong>qualité de vie</strong> au quotidien.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:07:39'),
(19,	'Rhumatologie',	'rhumatologie',	'01JF53H7Y7C9AKA2ET3HVRKQV3.jpg',	'<p>La <strong>rhumatologie</strong> se concentre sur le diagnostic, le traitement et la gestion des maladies touchant les articulations, les muscles et les os, telles que l\'arthrite, l\'ostéoporose ou les rhumatismes inflammatoires. Nos solutions incluent des dispositifs de soutien, des thérapies adaptées et un accompagnement personnalisé pour réduire les douleurs, améliorer la mobilité et prévenir les complications. Grâce à une approche globale, la rhumatologie vise à améliorer votre <strong>bien-être quotidien</strong> et à préserver votre <strong>autonomie</strong>.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:08:48'),
(20,	'Éducation des patients',	'education-des-patients',	'01JF5344JT4XBWW4XNKZ9QKH9T.jpg',	'<p>L’<strong>éducation des patients</strong> joue un rôle essentiel dans la prise en charge des pathologies et la réussite des traitements. Grâce à des conseils personnalisés et des informations claires, nous aidons les patients à comprendre leur condition, à adopter les bons gestes et à utiliser efficacement leurs dispositifs orthopédiques. Notre objectif est de favoriser l’<strong>autonomie</strong>, la <strong>prévention</strong> des complications et une meilleure qualité de vie au quotidien.</p>',	'2024-09-27 17:14:49',	'2024-12-15 11:01:39');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_category_id` bigint unsigned NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mettre_en_avant` tinyint(1) NOT NULL DEFAULT '0',
  `afficher` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_product_category_id_foreign` (`product_category_id`),
  CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `product_category_id`, `picture`, `title`, `slug`, `description`, `mettre_en_avant`, `afficher`, `created_at`, `updated_at`) VALUES
(1,	1,	'01JF53NKJQY2GHM7V0S4XQR8N9.jpg',	'Orthèse du genou',	'orthese-du-genou',	'<p>L\'<strong>orthèse du genou</strong> est un dispositif essentiel pour <strong>stabiliser</strong>, <strong>soulager</strong> et <strong>protéger</strong> votre articulation dans les cas de blessures, douleurs chroniques ou post-opérations. Conçue pour offrir un maintien optimal, elle réduit les contraintes sur le genou tout en permettant une mobilité sécurisée. Idéale pour traiter des pathologies telles que l’arthrose, les entorses ou les lésions ligamentaires, cette orthèse allie <strong>confort</strong>, <strong>durabilité</strong> et <strong>ajustement parfait</strong> pour accompagner votre quotidien ou vos activités sportives.</p>',	1,	1,	'2024-09-27 17:14:49',	'2024-12-15 11:11:11'),
(2,	2,	'01J8THE8X7T732AF8YH2RQDFCS.jpg',	'Semelles orthopédiques',	'semelles-orthopediques',	'<h2>Qu’est-ce qu’une semelle orthopédique ?</h2><p>Spécialement conçues pour <strong>traiter des difformités du pied ou certaines pathologies</strong>, les <strong>semelles orthopédiques</strong> sont plus spécifiquement un <strong>appareillage amovible créé sur mesure</strong> que l’on <strong>place directement dans une chaussure</strong>. Leur but est de <strong>corriger ou de compenser la posture</strong> de la personne qui en porte, mais également de <strong>soulager quelconque douleur plantaire</strong> qui pourrait survenir.</p><p>Une <strong>différence</strong> notable existe entre une <strong>semelle de bandagiste et de podologue</strong>. En podologie, cette dernière est pensée pour le mouvement alors qu’un bandagiste se base sur le pied posé à l’arrêt.</p><h2>Quels sont les types de semelle orthopédique ?</h2><p>La <strong>semelle orthopédique</strong> ne se résume pas qu’à un seul modèle. Il en existe divers qui peuvent être différenciés selon leur utilité. On retrouve ainsi celles :</p><ul><li>De <strong>correction </strong>pour améliorer la structure du pied de l’enfant ;</li><li>De <strong>compensation </strong>en cas de différence de hauteur entre les membres et qui permet de soulager les inflammations du tendon ;</li><li>De <strong>soutien </strong>qui offre un appui souple et précis ;</li><li>De <strong>décharge</strong> ;</li><li>De <strong>stabilisation</strong> ;</li><li>De <strong>stimulation</strong> qui a pour but de corriger les troubles fonctionnels ;</li><li>Et de <strong>sport</strong>.</li></ul><p><br></p>',	0,	1,	'2024-09-27 17:14:49',	'2024-09-27 18:06:01'),
(3,	3,	'confortho2.jpg',	'Chaussures orthopédiques pour enfants',	'chaussures-orthopediques-pour-enfants',	'<p>Chaussures conçues pour les enfants</p>',	0,	1,	'2024-09-27 17:14:49',	'2024-09-27 17:14:49');

DROP TABLE IF EXISTS `pros`;
CREATE TABLE `pros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pros` (`id`, `title`, `description`, `category`, `subtitle`, `file_1`, `file_2`, `external_link`, `image`, `created_at`, `updated_at`) VALUES
(1,	'3M',	'<p>Les <strong>bandages 3M</strong> offrent une solution de haute qualité pour le <strong>soutien</strong>, la <strong>compression</strong> et la <strong>protection</strong> des zones blessées ou fragilisées. Conçus avec des matériaux innovants, ils allient <strong>confort</strong>, <strong>durabilité</strong> et <strong>facilité d\'utilisation</strong>. Idéaux pour une utilisation quotidienne ou après une intervention, les bandages 3M s\'adaptent parfaitement aux besoins des patients, qu\'il s\'agisse de stabiliser une articulation, de favoriser la cicatrisation ou de prévenir les blessures. Leur adhérence optimale garantit un maintien sûr et efficace.</p>',	'Bandagisterie',	'Bandages 3M',	'01J8THXKMP6X8NK6MF79QBGG42.pdf',	'01J8THXKN34TM1J3SZXRTJ5519.pdf',	'https://dupontbandagisterie.fr',	'01J8THXKNF81KKYJ9540PVFPHN.jpg',	'2024-09-27 17:14:49',	'2024-12-15 11:14:15'),
(2,	'Hansaplast',	'<p>Les produits <strong>Hansaplast</strong> sont conçus pour offrir un <strong>soutien optimal</strong>, une <strong>protection fiable</strong> et un <strong>confort supérieur</strong> en orthopédie et soins des blessures. Idéaux pour soulager les douleurs musculaires, stabiliser les articulations ou protéger les plaies, les bandages, pansements et solutions Hansaplast allient <strong>innovation</strong> et <strong>qualité médicale</strong>. Adaptés aux besoins du quotidien ou d’un usage spécifique, ils garantissent une <strong>récupération efficace</strong> tout en préservant votre mobilité.</p>',	'Orthopédie',	'Hansaplast',	'01J8TJ40V41YYSHV5G7MMVR33V.pdf',	'01J8TJ40VJ9N8XX16JFC9N1GFH.pdf',	'https://lambertorthopedie.fr',	'01J8TJ4MXH2CWXF1PZBVRNPTV3.jpg',	'2024-09-27 17:14:49',	'2024-12-15 11:15:05');

DROP TABLE IF EXISTS `section1`;
CREATE TABLE `section1` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `svg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `section1` (`id`, `title`, `description`, `svg`, `link`, `created_at`, `updated_at`) VALUES
(1,	'6 spécialistes',	'6 spécialistes',	'<svg  xmlns=\"http://www.w3.org/2000/svg\"  width=\"24\"  height=\"24\"  viewBox=\"0 0 24 24\"  fill=\"none\"  stroke=\"currentColor\"  stroke-width=\"2\"  stroke-linecap=\"round\"  stroke-linejoin=\"round\"  class=\"icon icon-tabler icons-tabler-outline icon-tabler-stethoscope\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><path d=\"M6 4h-1a2 2 0 0 0 -2 2v3.5h0a5.5 5.5 0 0 0 11 0v-3.5a2 2 0 0 0 -2 -2h-1\" /><path d=\"M8 15a6 6 0 1 0 12 0v-3\" /><path d=\"M11 3v2\" /><path d=\"M6 3v2\" /><path d=\"M20 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0\" /></svg>',	'https://confortho_laravel.test/#:~:text=EQUIPE-,N,s,-BernardLuc',	'2024-09-27 17:26:44',	'2024-12-15 10:16:26'),
(2,	'2 établissements',	'2 établissements',	'<svg  xmlns=\"http://www.w3.org/2000/svg\"  width=\"24\"  height=\"24\"  viewBox=\"0 0 24 24\"  fill=\"none\"  stroke=\"currentColor\"  stroke-width=\"2\"  stroke-linecap=\"round\"  stroke-linejoin=\"round\"  class=\"icon icon-tabler icons-tabler-outline icon-tabler-buildings\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><path d=\"M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15\" /><path d=\"M16 8h2c1 0 2 1 2 2v11\" /><path d=\"M3 21h18\" /><path d=\"M10 12v0\" /><path d=\"M10 16v0\" /><path d=\"M10 8v0\" /><path d=\"M7 12v0\" /><path d=\"M7 16v0\" /><path d=\"M7 8v0\" /><path d=\"M17 12v0\" /><path d=\"M17 16v0\" /></svg>',	'https://confortho_laravel.test/a-propos',	'2024-09-27 17:27:27',	'2024-12-15 10:17:20'),
(3,	'Sur mesure',	'Sur mesure',	'<svg  xmlns=\"http://www.w3.org/2000/svg\"  width=\"24\"  height=\"24\"  viewBox=\"0 0 24 24\"  fill=\"none\"  stroke=\"currentColor\"  stroke-width=\"2\"  stroke-linecap=\"round\"  stroke-linejoin=\"round\"  class=\"icon icon-tabler icons-tabler-outline icon-tabler-needle-thread\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><path d=\"M3 21c-.667 -.667 3.262 -6.236 11.785 -16.709a3.5 3.5 0 1 1 5.078 4.791c-10.575 8.612 -16.196 12.585 -16.863 11.918z\" /><path d=\"M17.5 6.5l-1 1\" /><path d=\"M17 7c-2.333 -2.667 -3.5 -4 -5 -4s-2 1 -2 2c0 4 8.161 8.406 6 11c-1.056 1.268 -3.363 1.285 -5.75 .808\" /><path d=\"M5.739 15.425c-1.393 -.565 -3.739 -1.925 -3.739 -3.425\" /><path d=\"M19.5 9.5l1.5 1.5\" /></svg>',	'https://confortho_laravel.test/competences-and-savoir-faire',	'2024-09-27 17:51:58',	'2024-12-15 10:17:31');

DROP TABLE IF EXISTS `section2`;
CREATE TABLE `section2` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `svg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `section2` (`id`, `title`, `description`, `svg`, `created_at`, `updated_at`) VALUES
(5,	'Expertise Médicale',	'Une équipe de spécialistes qualifiés pour vous conseiller et vous accompagner dans le choix de vos solutions orthopédiques.',	'\n<svg  xmlns=\"http://www.w3.org/2000/svg\"  width=\"24\"  height=\"24\"  viewBox=\"0 0 24 24\"  fill=\"none\"  stroke=\"currentColor\"  stroke-width=\"2\"  stroke-linecap=\"round\"  stroke-linejoin=\"round\"  class=\"icon icon-tabler icons-tabler-outline icon-tabler-medical-cross\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><path d=\"M13 3a1 1 0 0 1 1 1v4.535l3.928 -2.267a1 1 0 0 1 1.366 .366l1 1.732a1 1 0 0 1 -.366 1.366l-3.927 2.268l3.927 2.269a1 1 0 0 1 .366 1.366l-1 1.732a1 1 0 0 1 -1.366 .366l-3.928 -2.269v4.536a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-4.536l-3.928 2.268a1 1 0 0 1 -1.366 -.366l-1 -1.732a1 1 0 0 1 .366 -1.366l3.927 -2.268l-3.927 -2.268a1 1 0 0 1 -.366 -1.366l1 -1.732a1 1 0 0 1 1.366 -.366l3.928 2.267v-4.535a1 1 0 0 1 1 -1h2z\" /></svg>',	'2024-12-15 10:22:44',	'2024-12-15 10:28:03'),
(6,	'Solutions Personnalisées',	'Des dispositifs adaptés à vos besoins spécifiques pour un confort optimal et une récupération rapide.',	'\n<svg  xmlns=\"http://www.w3.org/2000/svg\"  width=\"24\"  height=\"24\"  viewBox=\"0 0 24 24\"  fill=\"none\"  stroke=\"currentColor\"  stroke-width=\"2\"  stroke-linecap=\"round\"  stroke-linejoin=\"round\"  class=\"icon icon-tabler icons-tabler-outline icon-tabler-medical-cross\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><path d=\"M13 3a1 1 0 0 1 1 1v4.535l3.928 -2.267a1 1 0 0 1 1.366 .366l1 1.732a1 1 0 0 1 -.366 1.366l-3.927 2.268l3.927 2.269a1 1 0 0 1 .366 1.366l-1 1.732a1 1 0 0 1 -1.366 .366l-3.928 -2.269v4.536a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-4.536l-3.928 2.268a1 1 0 0 1 -1.366 -.366l-1 -1.732a1 1 0 0 1 .366 -1.366l3.927 -2.268l-3.927 -2.268a1 1 0 0 1 -.366 -1.366l1 -1.732a1 1 0 0 1 1.366 -.366l3.928 2.267v-4.535a1 1 0 0 1 1 -1h2z\" /></svg>',	'2024-12-15 10:22:56',	'2024-12-15 10:28:04'),
(7,	'Produits de Qualité',	'Une sélection rigoureuse de produits certifiés pour garantir efficacité et durabilité.',	'\n<svg  xmlns=\"http://www.w3.org/2000/svg\"  width=\"24\"  height=\"24\"  viewBox=\"0 0 24 24\"  fill=\"none\"  stroke=\"currentColor\"  stroke-width=\"2\"  stroke-linecap=\"round\"  stroke-linejoin=\"round\"  class=\"icon icon-tabler icons-tabler-outline icon-tabler-medical-cross\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><path d=\"M13 3a1 1 0 0 1 1 1v4.535l3.928 -2.267a1 1 0 0 1 1.366 .366l1 1.732a1 1 0 0 1 -.366 1.366l-3.927 2.268l3.927 2.269a1 1 0 0 1 .366 1.366l-1 1.732a1 1 0 0 1 -1.366 .366l-3.928 -2.269v4.536a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-4.536l-3.928 2.268a1 1 0 0 1 -1.366 -.366l-1 -1.732a1 1 0 0 1 .366 -1.366l3.927 -2.268l-3.927 -2.268a1 1 0 0 1 -.366 -1.366l1 -1.732a1 1 0 0 1 1.366 -.366l3.928 2.267v-4.535a1 1 0 0 1 1 -1h2z\" /></svg>',	'2024-12-15 10:23:01',	'2024-12-15 10:28:07'),
(8,	'Innovation Technologique',	'Des équipements modernes utilisant les dernières avancées en matière de bandagisterie et d’orthopédie.',	'\n<svg  xmlns=\"http://www.w3.org/2000/svg\"  width=\"24\"  height=\"24\"  viewBox=\"0 0 24 24\"  fill=\"none\"  stroke=\"currentColor\"  stroke-width=\"2\"  stroke-linecap=\"round\"  stroke-linejoin=\"round\"  class=\"icon icon-tabler icons-tabler-outline icon-tabler-medical-cross\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><path d=\"M13 3a1 1 0 0 1 1 1v4.535l3.928 -2.267a1 1 0 0 1 1.366 .366l1 1.732a1 1 0 0 1 -.366 1.366l-3.927 2.268l3.927 2.269a1 1 0 0 1 .366 1.366l-1 1.732a1 1 0 0 1 -1.366 .366l-3.928 -2.269v4.536a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-4.536l-3.928 2.268a1 1 0 0 1 -1.366 -.366l-1 -1.732a1 1 0 0 1 .366 -1.366l3.927 -2.268l-3.927 -2.268a1 1 0 0 1 -.366 -1.366l1 -1.732a1 1 0 0 1 1.366 -.366l3.928 2.267v-4.535a1 1 0 0 1 1 -1h2z\" /></svg>',	'2024-12-15 10:23:08',	'2024-12-15 10:28:09'),
(9,	'Accompagnement Complet',	'Un suivi personnalisé, de la prise de mesure jusqu\'à l\'utilisation quotidienne de vos dispositifs.',	'\n<svg  xmlns=\"http://www.w3.org/2000/svg\"  width=\"24\"  height=\"24\"  viewBox=\"0 0 24 24\"  fill=\"none\"  stroke=\"currentColor\"  stroke-width=\"2\"  stroke-linecap=\"round\"  stroke-linejoin=\"round\"  class=\"icon icon-tabler icons-tabler-outline icon-tabler-medical-cross\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><path d=\"M13 3a1 1 0 0 1 1 1v4.535l3.928 -2.267a1 1 0 0 1 1.366 .366l1 1.732a1 1 0 0 1 -.366 1.366l-3.927 2.268l3.927 2.269a1 1 0 0 1 .366 1.366l-1 1.732a1 1 0 0 1 -1.366 .366l-3.928 -2.269v4.536a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-4.536l-3.928 2.268a1 1 0 0 1 -1.366 -.366l-1 -1.732a1 1 0 0 1 .366 -1.366l3.927 -2.268l-3.927 -2.268a1 1 0 0 1 -.366 -1.366l1 -1.732a1 1 0 0 1 1.366 -.366l3.928 2.267v-4.535a1 1 0 0 1 1 -1h2z\" /></svg>',	'2024-12-15 10:23:16',	'2024-12-15 10:28:11'),
(10,	'Service Proche de Vous',	'Deux établissements à votre disposition pour un accès rapide et des conseils en face-à-face.',	'\n<svg  xmlns=\"http://www.w3.org/2000/svg\"  width=\"24\"  height=\"24\"  viewBox=\"0 0 24 24\"  fill=\"none\"  stroke=\"currentColor\"  stroke-width=\"2\"  stroke-linecap=\"round\"  stroke-linejoin=\"round\"  class=\"icon icon-tabler icons-tabler-outline icon-tabler-medical-cross\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"/><path d=\"M13 3a1 1 0 0 1 1 1v4.535l3.928 -2.267a1 1 0 0 1 1.366 .366l1 1.732a1 1 0 0 1 -.366 1.366l-3.927 2.268l3.927 2.269a1 1 0 0 1 .366 1.366l-1 1.732a1 1 0 0 1 -1.366 .366l-3.928 -2.269v4.536a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-4.536l-3.928 2.268a1 1 0 0 1 -1.366 -.366l-1 -1.732a1 1 0 0 1 .366 -1.366l3.927 -2.268l-3.927 -2.268a1 1 0 0 1 -.366 -1.366l1 -1.732a1 1 0 0 1 1.366 -.366l3.928 2.267v-4.535a1 1 0 0 1 1 -1h2z\" /></svg>',	'2024-12-15 10:23:22',	'2024-12-15 10:28:13');

DROP TABLE IF EXISTS `section3`;
CREATE TABLE `section3` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ul_li_list` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ul_li_list_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `section3` (`id`, `image`, `category`, `title`, `description`, `ul_li_list`, `ul_li_list_2`, `link`, `created_at`, `updated_at`) VALUES
(1,	'01J8TH70ZWW0KV0MCGD981N3E2.jpg',	'Bandagisterie spécialisée',	'Votre spécialiste en bandagisterie à Marche-en-Famenne',	'Chez Confortho Marche-en-Famenne, nous mettons à votre disposition des solutions orthopédiques adaptées pour vous accompagner dans votre quotidien. Spécialisés dans la vente et l\'adaptation d\'équipements de bandagisterie, nous vous offrons un service personnalisé alliant expertise, confort et qualité.\n\n',	'<ul><li>Large gamme d\'aides à la mobilité&nbsp;</li><li>&nbsp;Chaussures orthopédiques sur mesure&nbsp;</li><li>&nbsp;Bandages et orthèses pour le confort articulaire&nbsp;</li><li>&nbsp;Solutions pour le traitement des douleurs lombaires&nbsp;</li></ul><p><br></p>',	'<ul><li>Accompagnement par des professionnels qualifiés</li><li>Équipements modernes et innovants</li><li>Produits adaptés aux besoins de chaque patient</li><li>Service proche de vous avec un suivi personnalisé</li></ul>',	'https://confortho_laravel.test/a-propos',	'2024-09-27 17:34:38',	'2024-12-15 10:38:53');

DROP TABLE IF EXISTS `section4`;
CREATE TABLE `section4` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` double NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `section4` (`id`, `text`, `note`, `category`, `image`, `title`, `created_at`, `updated_at`) VALUES
(1,	'Note',	9.2,	'Notre réputation',	'01J8TFPEECX16G180EGT2JRME0.jpg',	'Confortho bandagisterie découvrez nos 2 adresses',	'2024-09-27 17:35:32',	'2024-12-15 10:44:16');

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gfjadvZqOru6wHnyQSku0msrCxeL9hcRYtm7foLE',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWFFGRkMzUEhNQmlWWkdSblVmaWxqSWRaWXNsbzFyUVJyYlhHRkVOYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vY29uZm9ydGhvX2xhcmF2ZWwudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1734271609),
('hz7GsLy9GPI5l2gyhsYJGEY0bitjkC1chSYsmp0U',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0dydVR0Y1pHSVJLQXlTRjl1RmNBVHRDcHpDVk9qenNVRUE0MTVxeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vY29uZm9ydGhvX2xhcmF2ZWwudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1734271885),
('MY89QvHfAEb6QbD3F7NJdWN4Jny0DMZlSrdxubNA',	1,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',	'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiSUxucXZ4QXBSTXpLSTVVRWRqbXd6WnlCU0g3OTRzaWh6cWRoZ09hZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vY29uZm9ydGhvX2xhcmF2ZWwudGVzdC9wb2xpdGlxdWUtZGUtY29uZmlkZW50aWFsaXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRHb09RdENrZ3B5eVJLUnlETU9lL0p1VWN1Y0tPa3R0VGVQdThUQjBpa0xEN3lNMFFKVGR0LiI7czo4OiJmaWxhbWVudCI7YTowOnt9czo2OiJ0YWJsZXMiO2E6MTp7czozMDoiTGlzdFByb2R1Y3RDYXRlZ29yaWVzX3Blcl9wYWdlIjtzOjM6ImFsbCI7fX0=',	1734270600),
('OlPIeUFy0aUSvlEAYIQaK3Y6guc73TD4I0xiSG0X',	1,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',	'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiaUxBWGFzejk4dmZmUDRKQVJvWmhMSU5FM3Z2UmFhZ1ZMTFBnQkpUYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vY29uZm9ydGhvX2xhcmF2ZWwudGVzdC9wcm9mZXNzaW9ubmVscyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkR29PUXRDa2dweXlSS1J5RE1PZS9KdVVjdWNLT2t0dFRlUHU4VEIwaWtMRDd5TTBRSlRkdC4iO3M6ODoiZmlsYW1lbnQiO2E6MDp7fX0=',	1734271108);

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1,	'general.brand_name',	'\"bandagisterie Confortho\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(2,	'general.logo',	'\"01JF554Z34461HSAK7KPJMP0R6.png\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(3,	'seo.title',	'\"Confortho (orthopédie-bandagisterie)\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(4,	'seo.description',	'\"Fabricant de technologies médicales à Liège\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(5,	'Tel Chênée',	'\"04 263 53 73\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(6,	'Tel Aye',	'\"084 43 37 40\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(7,	'contact.email',	'\"info@bandagisterie-confortho.be\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(8,	'contact.phone',	'\"04 263 53 73\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(9,	'contact.address1.street',	'\"Rue du Confluent 2\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(10,	'contact.address1.number',	'\"2\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(11,	'contact.address1.postal_code',	'\"Liège\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(12,	'contact.google_map1',	'\"https://maps.app.goo.gl/gga4sbeQxCev3p1P9\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(13,	'contact.address2.street',	'\"Rue du Vivier 30\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(14,	'contact.address2.number',	'\"30\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(15,	'contact.address2.postal_code',	'\"Marche-en-Famenne\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(16,	'contact.google_map2',	'\"https://maps.app.goo.gl/i3PsLucN7TcG4nyw5\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(17,	'contact.facebook',	'\"https://www.facebook.com/p/Confortho-100066653604311/?locale=fr_FR\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(18,	'contact.instagram',	'\"https://www.instagram.com/confortho.orthopedie?utm_source=qr\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(19,	'contact.linkedin',	'\"https://www.instagram.com/confortho.orthopedie?utm_source=qr\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(20,	'conditions.generales',	'\"<p>a</p>\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(21,	'conditions.vie_privee',	'\"<p>a</p>\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(22,	'horaires.lundi',	'\"09:30–13:00 14:00–17:30\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(23,	'horaires.mardi',	'\"09:30–13:00 14:00–17:30\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(24,	'horaires.mercredi',	'\"09:30–13:00 14:00–17:30\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(25,	'horaires.jeudi',	'\"09:30–13:00 14:00–17:30\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(26,	'horaires.vendredi',	'\"09:30–13:00 14:00–17:30\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(27,	'horaires.samedi',	'\"09:30–13:00 14:00–17:30\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03'),
(28,	'horaires.dimanche',	'\"Fermé\"',	'2024-12-15 11:37:03',	'2024-12-15 11:37:03');

DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `slides` (`id`, `title`, `category`, `short_description`, `image`, `created_at`, `updated_at`) VALUES
(4,	'Aides à la mobilité',	'Mobilité',	'Découvrez nos solutions pour faciliter vos déplacements au quotidien. Équipements modernes et confortables adaptés à vos besoins.',	'/01JF502T3QX2A735YYJCTK1S2M.webp',	'2024-12-15 10:08:30',	'2024-12-15 10:08:30'),
(5,	'Chaussures orthopédiques',	'Orthopédie',	'Une gamme complète de chaussures alliant confort, style et soutien optimal pour vos pieds. Conçues pour un bien-être durable.',	'/01JF50DJ8NTRKAG3MFTYM1S7N8.webp',	'2024-12-15 10:14:22',	'2024-12-15 10:14:22'),
(6,	'Chiropratique',	'Santé du dos',	' Prenez soin de votre colonne vertébrale avec nos solutions chiropratiques spécialisées. Une santé du dos optimale pour une meilleure qualité de vie.',	'/01JF50F3DY4G30J30KFZQVGJYH.webp',	'2024-12-15 10:15:13',	'2024-12-15 10:15:13');

DROP TABLE IF EXISTS `specialistes`;
CREATE TABLE `specialistes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `specialistes_uuid_unique` (`uuid`),
  UNIQUE KEY `specialistes_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `specialistes` (`id`, `uuid`, `slug`, `short_description`, `name`, `firstname`, `picture`, `job`, `created_at`, `updated_at`) VALUES
(1,	'166e6aa5-0d3f-4d1a-9324-c4ef54f75959',	'dupont-jean',	'descr courte',	'Dupont',	'Jean',	'team-04.jpg',	'Orthopédiste',	'2024-09-27 17:14:49',	'2024-09-27 17:14:49'),
(2,	'55a70248-6ebf-460e-ab0d-0cbce942b969',	'martin-marie',	'descr courte',	'Martin',	'Marie',	'team-04.jpg',	'Chirurgien',	'2024-09-27 17:14:49',	'2024-09-27 17:14:49'),
(3,	'345c359a-8160-4263-bccf-932979c27db6',	'durand-sophie',	'descr courte',	'Durand',	'Sophie',	'team-04.jpg',	'Podologue',	'2024-09-27 17:14:49',	'2024-09-27 17:14:49'),
(4,	'decd1f0c-fdcc-49b5-bf7c-41cb3111c1f5',	'lefevre-claire',	'descr courte',	'Lefevre',	'Claire',	'team-04.jpg',	'Kinésithérapeute',	'2024-09-27 17:14:49',	'2024-09-27 17:14:49'),
(5,	'a77bb3e9-7f99-4af9-b8b2-65fd53a7c2b1',	'bernard-luc',	'descr courte',	'Bernard',	'Luc',	'team-04.jpg',	'Prothésiste',	'2024-09-27 17:14:49',	'2024-09-27 17:14:49'),
(6,	'dccc671d-0ce9-46e3-83fb-c297cd22b67c',	'moreau-pierre',	'descr courte',	'Moreau',	'Pierre',	'team-04.jpg',	'Ergothérapeute',	'2024-09-27 17:14:49',	'2024-09-27 17:14:49'),
(7,	'd564b872-ef96-481f-a773-721fd4b04b8b',	'roux-claire',	'descr courte',	'Roux',	'Claire',	'team-04.jpg',	'Orthésiste',	'2024-09-27 17:14:49',	'2024-09-27 17:14:49'),
(8,	'ea7effb9-5dc2-4304-91e1-b4a0a41989e4',	'petit-paul',	'descr courte',	'Petit',	'Paul',	'team-04.jpg',	'Technicien Orthopédique',	'2024-09-27 17:14:49',	'2024-09-27 17:14:49');

DROP TABLE IF EXISTS `specialites`;
CREATE TABLE `specialites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `specialites_uuid_unique` (`uuid`),
  UNIQUE KEY `specialites_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `specialites` (`id`, `uuid`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1,	'rtrhrteh',	'rgzergezg',	'erghrteh',	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Marcel',	'powolnymarcel@gmail.com',	NULL,	'$2y$12$GoOQtCkgpyyRKRyDMOe/JuUcucKOkttTePu8TB0ikLD7yM0QJTdt.',	NULL,	'2024-09-27 17:26:10',	'2024-09-27 17:26:10');

-- 2024-12-15 14:14:13
