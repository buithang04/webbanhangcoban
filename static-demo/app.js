const slides = [
  { kicker: 'BXT / NEW SEASON', title: 'BXT-shopper', subtitle: 'Thiên đường mua sắm', description: 'Thiên đường mua sắm trực tuyến dành cho mọi nhu cầu! Tại đây, chúng tôi tự hào mang đến nhiều lựa chọn thời trang và phụ kiện từ các thương hiệu được yêu thích.', image: 'public/frontend/img/girl1.png' },
  { kicker: 'BXT / EVERYDAY', title: 'BXT-shopper', subtitle: 'Uy tín', description: 'Chúng tôi luôn nỗ lực xây dựng một nơi để bạn có thể an tâm lựa chọn sản phẩm phù hợp với phong cách của mình.', image: 'public/frontend/img/girl2.png' },
  { kicker: 'BXT / FOR YOU', title: 'BXT-shopper', subtitle: 'Khách hàng là ưu tiên', description: 'Mỗi ý kiến và mỗi trải nghiệm của khách hàng đều giúp BXT-shopper hoàn thiện hơn mỗi ngày.', image: 'public/frontend/img/girl3.png' }
];
const products = [
  { name:'Áo thun basic premium', brand:'BXT', category:'Áo', price:299000, image:'1905086_ELMM_149.webp' },
  { name:'Áo polo nam cotton', brand:'BXT', category:'Áo', price:474000, image:'1905131_OLIV_198.webp' },
  { name:'Áo khoác thể thao', brand:'BXT', category:'Áo', price:649000, image:'1905160_WHIT_237.webp' },
  { name:'Áo ba lỗ Adidas', brand:'Adidas', category:'Áo', price:824000, image:'adidas_Basketball_Sleeveless_Tee_Gender_Neutral_Beige_JD6135_21_model51.avif' },
  { name:'Áo tennis Adidas', brand:'Adidas', category:'Áo', price:999000, image:'adidas_Heritage_Tennis_Tee_White_JC6742_HM136.avif' },
  { name:'Áo Real Madrid chính hãng', brand:'Adidas', category:'Áo', price:1174000, image:'Ao_Real_Madrid_US_Pack_trang_JN3073_21_model81.avif' },
  { name:'Đồng hồ Gucci Dive', brand:'Gucci', category:'Phụ kiện', price:1349000, image:'796763_IEZA0_8652_001_100_0000_Light-Gucci-Dive-watch-40mm75.avif' },
  { name:'Đồng hồ Gucci Timeless', brand:'Gucci', category:'Phụ kiện', price:1524000, image:'796777_IEWA0_1000_001_100_0000_Light-Gucci-Dive-watch-40mm46.jpg' },
  { name:'Kính mát Versace Oval', brand:'Versace', category:'Phụ kiện', price:1699000, image:'90_O2285-O10025A64_ONUL_20_SignatureOvalSunglasses-Sunglasses-Versace-online-store_0_112.avif' },
  { name:'Kính mát Versace Signature', brand:'Versace', category:'Phụ kiện', price:1874000, image:'90_O4489U-OGB18755_ONUL_20_SignatureRectangularSunglasses-Sunglasses-Versace-online-store_0_117.avif' },
  { name:'Giày Adidas Samba OG trắng', brand:'Adidas', category:'Giày', price:1199000, image:'Giay_Samba_OG_trang_IG1024_01_standard52.avif' },
  { name:'Giày Adidas Ultraboost 5', brand:'Adidas', category:'Giày', price:2499000, image:'Giay_Ultraboost_5_DJen_ID8812_HM112.avif' }
];
let slideIndex = 0;
function showSlide(index) {
  slideIndex = (index + slides.length) % slides.length;
  const slide = slides[slideIndex];
  document.getElementById('hero-kicker').textContent = slide.kicker;
  document.getElementById('hero-title').textContent = slide.title;
  document.getElementById('hero-subtitle').textContent = slide.subtitle;
  document.getElementById('hero-description').textContent = slide.description;
  document.getElementById('hero-image').src = slide.image;
  document.querySelectorAll('.hero-dots button').forEach((button, i) => { button.classList.toggle('active', i === slideIndex); if (i === slideIndex) button.setAttribute('aria-current','true'); else button.removeAttribute('aria-current'); });
}
document.querySelector('.hero-arrow.previous').addEventListener('click', () => showSlide(slideIndex - 1));
document.querySelector('.hero-arrow.next').addEventListener('click', () => showSlide(slideIndex + 1));
document.querySelectorAll('.hero-dots button').forEach((button,i) => button.addEventListener('click', () => showSlide(i)));
const grid = document.getElementById('product-grid');
const dialog = document.getElementById('product-dialog');
let activeCategory = 'all';
let searchText = '';
const money = value => new Intl.NumberFormat('vi-VN').format(value) + ' VND';
function renderProducts() {
  const visible = products.filter(product => (activeCategory === 'all' || product.category === activeCategory) && (product.name + ' ' + product.brand).toLocaleLowerCase('vi').includes(searchText));
  grid.replaceChildren();
  visible.forEach(product => {
    const article = document.createElement('article'); article.className = 'product-card';
    const button = document.createElement('button'); button.type = 'button'; button.setAttribute('aria-label','Xem ' + product.name);
    const media = document.createElement('span'); media.className = 'product-media';
    const image = document.createElement('img'); image.src = 'public/upload/product/' + encodeURIComponent(product.image); image.alt = product.name; image.loading = 'lazy'; image.width = 500; image.height = 500; media.append(image);
    const brand = document.createElement('p'); brand.className = 'product-brand'; brand.textContent = 'BXT / ' + product.brand;
    const name = document.createElement('h3'); name.className = 'product-name'; name.textContent = product.name;
    const price = document.createElement('p'); price.className = 'product-price'; price.textContent = money(product.price);
    button.append(media,brand,name,price); article.append(button); grid.append(article);
    button.addEventListener('click', () => { document.getElementById('dialog-image').src = image.src; document.getElementById('dialog-image').alt = product.name; document.getElementById('dialog-brand').textContent = 'BXT / ' + product.brand; document.getElementById('dialog-title').textContent = product.name; document.getElementById('dialog-price').textContent = money(product.price); dialog.showModal(); });
  });
  document.getElementById('product-count').textContent = visible.length + ' sản phẩm';
  document.getElementById('empty-state').hidden = visible.length > 0;
}
document.querySelectorAll('[data-filter]').forEach(button => button.addEventListener('click', () => {
  activeCategory = button.dataset.filter;
  document.querySelectorAll('.filter-chips button').forEach(chip => { const selected = chip.dataset.filter === activeCategory; chip.classList.toggle('selected', selected); chip.setAttribute('aria-pressed', String(selected)); });
  renderProducts();
  if (button.closest('.category-links')) document.getElementById('san-pham').scrollIntoView({behavior: matchMedia('(prefers-reduced-motion: reduce)').matches ? 'instant' : 'smooth'});
}));
document.getElementById('search-form').addEventListener('submit', event => { event.preventDefault(); searchText = document.getElementById('search-input').value.trim().toLocaleLowerCase('vi'); renderProducts(); document.getElementById('san-pham').scrollIntoView({behavior: matchMedia('(prefers-reduced-motion: reduce)').matches ? 'instant' : 'smooth'}); });
document.querySelector('.dialog-close').addEventListener('click', () => dialog.close());
dialog.addEventListener('click', event => { if (event.target === dialog) dialog.close(); });
renderProducts();
