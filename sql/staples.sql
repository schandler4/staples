DROP TABLE IF EXISTS userAccount;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS productOrder;

CREATE TABLE userAccount (
	userId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	userEmail VARCHAR(128) NOT NULL,
	userName VARCHAR(128) NOT NULL,
	UNIQUE(userEmail),
	UNIQUE(userName),
	PRIMARY KEY(userId)
);

CREATE TABLE orders (
	ordersId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	userId INT UNSIGNED NOT NULL,
	INDEX(userId),
	FOREIGN KEY(userId) REFERENCES userAccount(userId),
	PRIMARY KEY(ordersId)
);

CREATE TABLE product (
	productId INT UNSIGNED NOT NULL,
	productDescription VARCHAR(255),
	UNIQUE(productDescription),
	PRIMARY KEY(productId)
);

CREATE TABLE productOrder (
	userId INT UNSIGNED NOT NULL,
	ordersId INT UNSIGNED NOT NULL,
	productId INT UNSIGNED NOT NULL,
	INDEX(userId),
	INDEX(ordersId),
	INDEX(productId),
	FOREIGN KEY(userId) REFERENCES userAccount(userId),
	FOREIGN KEY(ordersId) REFERENCES orders(ordersId),
	FOREIGN KEY(productId) REFERENCES product(productId),
	PRIMARY KEY(userId, ordersId, productId)
);
