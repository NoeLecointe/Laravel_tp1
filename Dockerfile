FROM nginx
COPY reseau /usr/share/nginx/html
EXPOSE 80
VOLUME reseau
CMD ["nginx", "-g", "daemon off;"]
