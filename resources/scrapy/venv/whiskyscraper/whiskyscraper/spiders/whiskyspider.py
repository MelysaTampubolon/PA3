import scrapy
import mysql.connector
from scrapy import Selector
from currency_converter import CurrencyConverter


db = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="pekan_db"
)

mycursor = db.cursor()
c = CurrencyConverter()


class WhiskeySpider(scrapy.Spider):
    name = 'whisky'
    start_urls = ['https://www.whiskyshop.com/scotch-whisky?item_availability=In+Stock']
    # custom_settings = {"FEEDS": {"whisky.csv": {"format": "csv"}}}

    def parse(self, response):
        for products in response.css('div.product-item-info'):

            imgLinkSelector = Selector(text='<span class="product-image-wrapper"><img src="">')
            mycursor.execute("SELECT MAX(id) FROM riwayat_fetch_data")
            id_fetch = mycursor.fetchone()[0]
            print(id_fetch)
            # history_id = get_id + 1
            if products.css('div.price-box::text').get() != 'Sold Out':
                nama_item = products.css('a.product-item-link::text').get()
                price = products.css('span.price::text').get().replace('£', '').replace(',', '')
                round_price = round(float(price))
                trim_price = str(round_price).split('.', 1)[0]
                fix_price = c.convert(float(trim_price), 'EUR', 'IDR')
                if products.css('img.product-image-photo').attrib['src'] is not '':
                    imgLink = products.css('img.product-image-photo').attrib['src']
                else:
                    imgLink = products.css('img.lazy').attrib['data-original']
                # products.css('span.product-image-wrapper img.product-image-photo::attr(src)').get()
                # price = float(products.css('span.price::text').get().replace('£', '')) * 17371730
                link = products.css('a.product-item-link').attrib['href']
                asuransi = 'Tidak'

                mycursor.execute(
                    "INSERT INTO product (riwayat_id, kategoriToped, kategoriShopee, url_produk, nama_produk, stok, harga, gambar, berat, waktuPreorder, asuransi) "
                    "VALUES (%s, 2785, 27157, %s, %s, 15, %s, %s, 1000, 15, %s)",
                    (id_fetch, link, nama_item, fix_price, imgLink, asuransi))
                db.commit()
            # #
            # # mycursor.execute("INSERT INTO riwayat_fetch_data (supplier_id, tanggal_fetch,)")
            #
            # mycursor.execute("INSERT INTO product (riwayat_id, url_produk, nama_produk, harga) VALUES (1, %s, %s, %s)", (link, nama_item, price))
            # db.commit()

        next_page = response.css('a.action.next').attrib['href']
        if next_page is not None:
            yield response.follow(next_page, callback=self.parse)

        db.close()

        # df = pd.read_json('testScrape.json')
        # print(df)
